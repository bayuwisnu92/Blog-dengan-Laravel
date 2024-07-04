@extends('layouts.main')

@section('container')
<div class="container">
    <!-- Header -->
    <header class="text-center my-5">
        <h1 class="display-4">Selamat Datang di Blog Kami</h1>
        <p class="lead">Temukan artikel menarik tentang berbagai topik di sini.</p>
        <a href="/blog" class="btn btn-dark btn-lg"><i class="bi bi-book"></i> Mulai Membaca</a>
    </header>

    <!-- Featured Posts -->
    <section class="my-5">
        <h2 class="text-center mb-4">Artikel Terbaru</h2>
        <div class="row">
            @foreach ($latestPosts as $post)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="position-absolute text-center px-3 py-2 text-white" style="background-color: rgba(0,0,0,0.8)"><a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></div>
                        @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}" style="max-height: 200px; object-fit:cover;">
                        @else
                            <img src="https://via.placeholder.com/200" class="card-img-top" alt="{{ $post->title }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{!! $post->title !!}</h5>
                            <p class="card-text">{!! Str::limit($post->excerpt, 100) !!}</p>
                            <a href="/post/{{ $post->slug }}" class="badge btn btn-dark"><i class="bi bi-arrow-right"></i> Baca Selengkapnya</a>
                        </div>
                        <div class="card-footer text-muted">
                            Diposting {{ $post->created_at->diffForHumans() }} oleh <a href="/author/{{ $post->user->username }}">{{ $post->user->name }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Popular Categories -->
    <section class="my-5">
        <h2 class="text-center mb-4">Categori Populer</h2>
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-3 mb-4">
                    <a href="/categories/{{ $category->slug }}" class="text-decoration-none">
                        <div class="card text-center bg-dark text-white">
                            <div class="card-body">
                                <h5 class="card-title">{{ $category->name }}</h5>
                                <p class="card-text">{{ $category->posts_count }} artikel</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center my-5" style="background-color: black; color:white">
        <p>&copy; 2024 Blog Kami. All rights reserved.</p>
    </footer>
</div>
@endsection
