<!DOCTYPE html>
<html>
<head>
    <title>Post Details</title>
</head>
<body>
    <h1>{{ $post->post }}</h1>
    <p>{{ $post->description }}</p>
    @if ($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" alt="Image">
    @endif
    <br>
    <a href="{{ route('posts.index') }}">Back to Post List</a>
</body>
</html>S