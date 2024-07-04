@extends('layouts.main')

@section('container')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-9 post">
                <h1 class="mb-3">{{ $title }}</h1>
                <div class="d-flex justify-content-center">
                    @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" width="800px" class="img-fluid mb-3">
                    @endif

                </div>
                <p class="mb-4 text-center">
                    <a href="/author/{{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a> | 
                    <a href="/categories" class="text-decoration-none">Category</a>: 
                    <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a>
                </p>
                <h3 class="mb-4">{{ $post->title }}</h3>
                <div class="mb-5">
                    {!! $post->body !!}
                </div>
                <a href="{{ $title === 'Single Post' ? '/blog' : '/dashboard/posts' }}" class="btn btn-primary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>
@endsection
