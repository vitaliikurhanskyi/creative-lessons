<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post)
    {
//        $posts = Post::all()->sortDesc();
//        return view('post.index', compact('posts'));
//        $categories = Category::all();
//        dd($categories);
//        $category = Category::find(1);
//        $posts = Post::where('category_id', $category->id)->get();
//        dd($posts);
        //$post = Post::find(1);

        //dd($post->category->title);

        //$category = Category::find(2);

        //dd($category->posts);


//        if($post->tags->isEmpty()) {
//            echo "this post doesn't have tags";
//            return;
//        }
//
//        foreach ($post->tags as $tag) {
//            echo $tag->title . "<br>";
//        }


//        $tag = Tag::find(1);
//
//        dd($tag->posts);

        $posts = Post::all()->sortDesc();
        return view('post.index', compact('posts'));

    }

    public function create()
    {
//        $postsArr = [
//            [
//                'title' => 'created title',
//                'content' => 'created content',
//                'image' => 'https://google.com',
//                'likes' => 30,
//                'is_published' => 1,
//            ],
//            [
//                'title' => 'created title 2',
//                'content' => 'created content 2',
//                'image' => 'https://google.com 2',
//                'likes' => 31,
//                'is_published' => 1,
//            ],
//        ];
//
//        foreach ($postsArr as $creatigPost) {
//            Post::create($creatigPost);
//        }
//
//        dd('created');

        $categories = Category::all();
        $tags = Tag::all();

        return view('post.create', compact('categories', 'tags'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);
        //dd($tags);
        $post = Post::create($data);
        //$index = 0;
//        foreach ($tags as $tag) {
//            PostTag::firstOrCreate([
//                'tag_id' => $tag,
//                'post_id' => $post->id,
//            ]);
//            //$index++;
//        }

        $post->tags()->attach($tags);

        return redirect()->route('post.index');
    }

    // Post $post
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => '',
        ]);

        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);

        return redirect()->route('post.show', $post->id);
    }

    public function destroy(Post $post)
    {
        //dd('im here');
        $post->delete();
        return redirect()->route('post.index');
    }

    public function restore()
    {
        $post = Post::withTrashed()->find(2);
        if ($post) {
            $post->restore();
            echo "the post has been restored!!!";
        }
    }

    public function firstOrCreate()
    {
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

    public function updateOrCreate()
    {
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
