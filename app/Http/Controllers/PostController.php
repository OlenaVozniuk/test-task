<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class PostController
{
    /**
     * @param Post $post
     * @return View
     */
    public function show(Post $post): View
    {
        return view('post.show', ['post' => $post]);
    }
}
