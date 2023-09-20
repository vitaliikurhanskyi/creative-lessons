<?php

namespace App\Http\Controllers\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Auth\Access\AuthorizationException;

class CreateController extends BaseController
{
    public function __invoke()
    {
        try {
            $this->authorize('create', Post::class);
        } catch (AuthorizationException $e) {
            return redirect()->route('home');
        }

        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact('categories', 'tags'));
    }
}
