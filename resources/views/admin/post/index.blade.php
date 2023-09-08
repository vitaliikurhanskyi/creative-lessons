@extends('admin.layouts.admin');

@section('content')

    @foreach($posts as $post)

        <article>
            <a href="{{ route('post.show', $post->id) }}">
                <h2>{{ $post->id }} - {{$post->title}}</h2>
            </a>
        </article>

        @if (!$loop->last)
            <hr>
        @endif

    @endforeach

    <div class="mt-4">{{ $posts->withQueryString()->links() }}</div>

@endsection
