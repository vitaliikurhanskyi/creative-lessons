@extends('layouts.main')
@section('content')
<h1 style="background-color: orange;">Posts</h1>
@foreach($posts as $post)

    <article>
        <a href="{{ route('post.show', $post->id) }}">
            <h2>{{$post->title}}</h2>
        </a>
    </article>

    @if (!$loop->last)
        <hr>
    @endif
@endforeach
@endsection

