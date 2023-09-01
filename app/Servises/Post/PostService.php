<?php


namespace App\Servises\Post;


use App\Models\Post;

class PostService
{

    public function store($data)
    {
        $tags = $data['tags'];
        unset($data['tags']);
        $post = Post::create($data);
        $post->tags()->attach($tags);
    }

    public function update($post, $data)
    {
        $tags = $data['tags'];
        unset($data['tags']);
        $post->update($data);
        $post->tags()->sync($tags);
    }
}
