@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Data Post</h1>
</div>

<div class="col-lg-8">
    <form method="POST" action="/dashboard/posts" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" oninput="generateSlug('title')" value="{{ old('title') }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" readonly value="{{ old('slug') }}">
            @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select @error('category_id') is-invalid @enderror" name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <img class="img-preview img-fluid col-sm-5 mb-3 mt-2">
            <label for="image" class="form-label">Post image</label>
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <input id="body" type="hidden" name="body" value="{{ old('body') }}">
            <trix-editor input="body"></trix-editor>
            @error('body')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create Post</button>
    </form>
</div>
<script>
   document.addEventListener("trix-attachment-add", function(event) {
    if (event.attachment.file) {
        uploadFileAttachment(event.attachment);
    }
});

function uploadFileAttachment(attachment) {
    var file = attachment.file;
    var form = new FormData();
    form.append("file", file);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "{{ route('upload') }}", true);
    xhr.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}");

    xhr.upload.onprogress = function(event) {
        var progress = (event.loaded / event.total) * 100;
        attachment.setUploadProgress(progress);
    };

    xhr.onload = function() {
        if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            attachment.setAttributes({
                url: response.url,
                href: response.url
            });
        } else {
            console.error("Error uploading file");
        }
    };

    xhr.send(form);
} 
</script>

@endsection
