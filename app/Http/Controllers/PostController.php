<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        //dd("Laravel курс с нуля, база. 13. Миграции. Редактирование миграций");
        $posts = Post::all();
        foreach ($posts as $post) {
            echo $post->title;
        }
        dd($posts);
    }

    public function create()
    {
        $postsArr = [
            [
                'title' => 'created title',
                'content' => 'created content',
                'image' => 'https://google.com',
                'likes' => 30,
                'is_published' => 1,
            ],
            [
                'title' => 'created title 2',
                'content' => 'created content 2',
                'image' => 'https://google.com 2',
                'likes' => 31,
                'is_published' => 1,
            ],
        ];

        foreach ($postsArr as $creatigPost) {
            Post::create($creatigPost);
        }

        dd('created');
    }

    public function update()
    {

        $post = Post::find(6);

        if($post) {
            $post->update([
                'title' => 'updated',
            ]);
            dd('updated');
        } else {
            echo "no";
        }

    }

    public function delete()
    {
        $post = Post::find(2);
        if($post) {
            $post->delete();
            echo "the post has been deleted";
        }
    }

    public function restore() {
        $post = Post::withTrashed()->find(2);
        if($post) {
            $post->restore();
            echo "the post has been restored!!!";
        }
    }

    public function firstOrCreate() {
        $post = Post::find(2);

        $anotherPost = [
            'title' => 'created title 2 first 123 123',
            'content' => 'created content 2 first',
            'image' => 'https://google.com 2 first',
            'likes' => 31,
            'is_published' => 1,
        ];

        $newPost = Post::firstOrCreate(['title' => "ha ha 123 some title php storm",], $anotherPost);

        dd($newPost);
    }

    public function updateOrCreate() {
        $anotherPost = [
            'title' => '777 123 update title 2 first 123 123',
            'content' => 'update content 2 first',
            'image' => 'https://google.com 2 first',
            'likes' => 31,
            'is_published' => 1,
        ];

        $post = Post::updateOrCreate(['title' => ' 123 update title 2 first 123 123'], $anotherPost);

    }

}
