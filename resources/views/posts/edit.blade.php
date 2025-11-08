<!doctype html>
<html lang="en">

<head>
    <title>Edit Post</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-2">
        <h1>Edit Post</h1>
        <form id="postForm" action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')

            <label for="title">Title: <span class="text-danger">*</span> </label>
            <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $post->title) }}"
                placeholder="Title">
            @error('title')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <label for="content">Content: <span class="text-danger">*</span> </label>
            <textarea class="form-control" name="contents" id="contents"
                placeholder="Content">{{ old('contents', $post->contents) }}</textarea>
            @error('contents')
                <p class="text-danger">{{ $message }}</p>
            @enderror

            <label for="status">Status: <span class="text-danger">*</span></label>
            <input type="radio" name="status" value="published" id="status" {{ old('status', $post->status) == 'published' ? 'checked' : '' }}>
            Published
            <input type="radio" name="status" value="draft" id="status" {{ old('status', $post->status) == 'draft' ? 'checked' : '' }}> Draft
            @error('status')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <br>

            <label for="featured">Is Featured?:</label>
            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $post->is_featured) ? 'checked' : '' }}> Yes
            <br>

            <label for="catgory">Category: <span class="text-danger">*</span></label>
            <select name="category" class="form-control" id="category">
                <option value="tech" {{ old('category', $post->category) == 'tech' ? 'selected' : '' }}>Tech</option>
                <option value="news" {{ old('category', $post->category) == 'news' ? 'selected' : '' }}>News</option>
                <option value="sports" {{ old('category', $post->category) == 'sports' ? 'selected' : '' }}>Sports
                </option>
            </select>
            @error('category')
                <p class="text-danger">{{ $message }}</p>
            @enderror

            <label for="image">Image</label>
            <input type="file" class="form-control" name="image">
            @if($post->getFirstMediaUrl('posts'))
                <img src="{{ $post->getFirstMediaUrl('posts') }}" width="120"><br>
            @endif
            <button class="btn btn-success mt-2" type="submit">Save</button>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"
        integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function () {
            $('#postForm').validate({
                rules: {
                    'title': {
                        required: true,
                        min: 3
                    },
                    'contents': {
                        required: true
                    },
                    'status': {
                        required: true
                    },
                    'category': {
                        required: true
                    }
                },
                messages: {
                    'title': {
                        required: 'Please enter title',
                        min: 'Title must be at least 3 characters'
                    },
                    'contents': {
                        required: 'Please enter contents'
                    },
                    'status': {
                        required: 'Please select any one status'
                    },
                    'category': {
                        required: 'Please select category',
                    }
                },
                errorPlacement: function (error, element) {
                    error.addClass('text-danger'.'<br>');
                    error.insertAfter(element);
                },
            });
        })
    </script>
</body>

</html>
