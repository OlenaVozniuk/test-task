<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use App\Services\Category\Contracts\CategoryServiceInterface;
use App\Services\Post\Contracts\PostServiceInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * @var PostServiceInterface
     */
    private PostServiceInterface $service;

    /**
     * @param PostServiceInterface $service
     */
    public function __construct(PostServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        return view('admin.posts.index', [
            'posts' => $this->service->getAllPaginated()
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('admin.posts.create', [
            'categories' => resolve(CategoryServiceInterface::class)->getAll()
        ]);
    }

    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $this->service->store($request->validated());

        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    }

    /**
     * @param Post $post
     * @return View
     */
    public function show(Post $post): View
    {
        return view('admin.posts.show', ['post' => $post]);
    }

    /**
     * @param Post $post
     * @return View
     */
    public function edit(Post $post): View
    {
        return view('admin.posts.edit', [
            'post'       => $post,
            'categories' => resolve(CategoryServiceInterface::class)->getAll()
        ]);
    }

    /**
     * @param UpdateRequest $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, Post $post): RedirectResponse
    {
        $this->service->update($post, $request->validated());

        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }

    /**
     * @param Post $post
     * @return RedirectResponse
     */
    public function destroy(Post $post): RedirectResponse
    {
        if (Auth::guard('admin')->id() == $post->admin_id) {
            $this->service->destroy($post);

            return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
        }
        return redirect()->route('posts.index')->with('error', 'Post can not be deleted');
    }
}
