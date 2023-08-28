@extends('layouts.main')
@section('content')
    <h1 style="background-color: orange;">Post Create</h1>
    <br>
    <form action="{{ route('post.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Post title</label>
            <input value="{{ old('title') }}" name="title" type="text" class="form-control" id="title" placeholder="">
            @error('title')
                <p class="text-bg-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Post content</label>
            <textarea name="content" class="form-control" id="content" rows="3">{{ old('content') }}</textarea>
            @error('content')
            <p class="text-bg-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input name="image" type="text" class="form-control" id="image" placeholder="path to the image">
        </div>
        <div class="mb-3">
            <select name="category_id" class="form-select" aria-label="Default select example">
                <option selected>Choose Category</option>

                @foreach($categories as $category)
                    <option
                        {{ old('category_id') == $category->id ? 'selected' : '' }}
                        value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach

            </select>
        </div>
        <div class="mb-3">
            <select name="tags[]" class="form-select" multiple aria-label="multiple select example">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" type="submit">Create</button>
        </div>
    </form>
@endsection

