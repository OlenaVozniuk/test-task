<?php

namespace App\Services\Post;

use App\Models\Post;
use App\Services\Base\BaseCrudService;
use App\Services\Post\Contracts\PostServiceInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PostService extends BaseCrudService implements PostServiceInterface
{
    /**
     * @return string
     */
    public function getModelClass(): string
    {
        return Post::class;
    }

    /**
     * @param array $data
     * @return Model
     */
    public function store(array $data): Model
    {
        $data['admin_id'] = Auth::guard('admin')->id();
        $post = parent::store($data);

        $image = $data['image'];
        $path = str_replace('public/', '', $image->store('public/images'));

        $post->images()->create([
            'path' => $path
        ]);

        return $post;
    }

    /**
     * @param Model $model
     * @param array $data
     * @return Model
     */
    public function update(Model $model, array $data): Model
    {
        $post = parent::update($model, $data);

        if (isset($data['image'])) {
            $image = $data['image'];
            $path = str_replace('public/', '', $image->store('public/images'));

            $post->images()->create([
                'path' => $path
            ]);
        }

        return $post;
    }
}
