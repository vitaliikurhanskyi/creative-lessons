<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    <br>
    <div class="row">
        <nav class="nav">
            <a class="nav-link" href="{{ route('post.index') }}">Posts</a>
            <a class="nav-link" href="{{ route('post.create') }}">Create the post</a>
            <a class="nav-link" href="{{ route('about.index') }}">About</a>
        </nav>
    </div>
    <br>
    @yield('content')
</div>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
