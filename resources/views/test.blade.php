<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>creative-blog</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="alert alert-success mt-5" role="alert">
                Laravel курс с нуля, база. 31. Admin LTE в Laravel, устанавливаем админку || 18:00
            </div>
            <a href="{{ route('post.index') }}" class="btn btn-info mt-5">To Posts</a>
            <a href="{{ route('article.index') }}" class="btn btn-info mt-5">To Articles</a>
        </div>
    </div>
</body>
</html>
