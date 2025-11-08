<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
</head>

<body>
    <h1>All Posts</h1>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p style="color:red">{{ session('error') }}</p>
    @endif

    <a href="{{ route('posts.create') }}">+ Create Post</a><br><br>

    <table border="1" cellpaddings="10">
        <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Title</th>
            <th>Contents</th>
            <th>Status</th>
            <th>Is Featured?</th>
            <th>Action</th>
        </tr>

        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>
                    @if ($post->getFirstMediaUrl('posts'))
                        <img src="{{ $post->getFirstMediaUrl('posts') }}" alt="image" width="180">
                    @endif
                </td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->contents }}</td>
                <td>{{ $post->status }}</td>
                <td>{{ $post->is_featured ? 'Yes' : 'No' }}</td>
                <td>
                    <a href="{{ route('posts.edit', $post->id) }}">Edit</a>

                    <form action="{{ route('posts.delete', $post->id) }}" method="POST" style="display: inline;">
                        @csrf @method('DELETE')

                        <button type="submit" onclick="return confirm('Delete?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>

</html>
