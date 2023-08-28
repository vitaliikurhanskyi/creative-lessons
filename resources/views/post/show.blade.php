@extends('layouts.main')
@section('content')
    <h1 class="mb-4" style="background-color: orange;">Posts</h1>
    <div>
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->content }}</p>
    </div>
    <div>
        <a class="btn btn-primary btn-lg mt-3" href="{{ route('post.index') }}"><<<---BACK</a>
    </div>
    <div>
        <a class="btn btn-primary btn-lg mt-3" href="{{ route('post.edit', $post->id) }}">Edite</a>
    </div>
@endsection

