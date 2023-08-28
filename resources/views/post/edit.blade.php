@extends('layouts.main')
@section('content')
    <h1 style="background-color: orange;">Post Edit</h1>
    <br>
    <form action="{{ route('post.update', $post->id) }}" method="POST">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="title" class="form-label">Post title</label>
            <input value="{{ $post->title }}" name="title" type="text" class="form-control" id="title" placeholder="">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Post content</label>
            <textarea name="content" class="form-control" id="content" rows="3">{{ $post->content }}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input value="{{ $post->image }}" name="image" type="text" class="form-control" id="image" placeholder="path to the image">
        </div>
        <div class="mb-3">
            <select name="category_id" class="form-select" aria-label="Default select example">
                <option selected>Choose Category</option>
                @foreach($categories as $category)
                    <option
                    {{ $category->id == $post->category_id ? 'selected' : '' }}
                    value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <select name="tags[]" class="form-select" multiple aria-label="multiple select example">
                @foreach($tags as $tag)
                    <option
                        @foreach($post->tags as $post_tag)
                        {{ $tag->id === $post_tag->id ? 'selected' : '' }}
                        @endforeach
                        value="{{ $tag->id }}">{{ $tag->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" type="submit">Update</button>
        </div>
    </form>
    <form method="POST" action="{{ route('post.destroy', $post->id) }}">
        @csrf
        @method('delete')
        <div class="mb-3">
            <input type="submit" class="btn btn-danger" value="Delete">
        </div>
    </form>
@endsection

