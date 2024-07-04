@extends('layouts.main')

@section('container')
<div class="container">
    <h1 class="mb-4 text-center"><i class="bi bi-file-earmark-fill"></i> {{ $title }}</h1>

    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/blog">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari postingan" aria-label="Recipient's username" aria-describedby="button-addon2" name="search" value="{{ request('search') }}">
                    <button class="btn btn-light cari" type="submit" id="button-addon2"><i class="bi bi-search"></i> Cari</button>
                </div>
            </form>
        </div>
    </div>

    @if ($posts->count())

        <h2 class="text-center mb-4">Last Update</h2>
        <div class="card mb-5 text-center">
            <div class="position-absolute text-center px-3 py-2 text-white" style="background-color: rgba(0,0,0,0.8)">{{ $posts[0]->category->name }}</div>
            @if($posts[0]->image)
                <img src="{{ asset('storage/' . $posts[0]->image) }}" class="card-img-top" alt="..." style="height:600px; object-fit:cover;">
            @else
                <img src="https://images.unsplash.com/photo-1416339306562-f3d12fefd36f?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&s=92f3e02f63678acc8416d044e189f515" class="card-img-top" alt="..." style="height:600px; object-fit:cover;">
            @endif
            <div class="card-body">
                <h5 class="card-title" style="font-size: 28px">Judul : {{ $posts[0]->title }}</h5>
                <p class="card-text" style="  font-size:20px">
                    by: <a href="/author/{{ $posts[0]->user->username }}" class="text-decoration-none">{{ $posts[0]->user->name }}</a>
                    | category: <a href="/categories/{{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a>
                </p>
                <p>{!! $posts[0]->excerpt !!}</p>
                <div class="card-footer text-end">
                    <a href="/post/{{ $posts[0]['slug'] }}" class="badge btn btn-dark"><i class="bi bi-three-dots-vertical"></i> Baca Selengkapnya</a>
                </div>
                <p class="card-text"><small class="text-body-secondary">Last updated {{ $posts[0]->created_at->diffForHumans() }}</small></p>
            </div>
        </div>
        <hr>

        <section class="my-5">
            <h2 class="text-center mb-4">Artikel Terbaru</h2>
            <div class="row">
                @foreach ($posts->skip(1) as $post)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="position-absolute text-center px-3 py-2 text-white" style="background-color: rgba(0,0,0,0.8)">{{ $post->category->name }}</div>
                            @if($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}" style="max-height: 200px; object-fit:cover;">
                            @else
                                <img src="https://via.placeholder.com/200" class="card-img-top" alt="{{ $post->title }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{{ Str::limit($post->excerpt, 100) }}</p>
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
    @else
        <p class="text-center"><i class="bi bi-exclamation-circle-fill"></i> Belum ada postingan</p>
    @endif
</div>
<span>
    <p class="d-inline">Categories: @foreach($categories as $category)
        <a href="/categories/{{ $category->slug }}"> #{{ $category->name }}</a>@if (!$loop->last),@endif
    @endforeach
    </p>
</span>
<div class="mt-4">
    <p>Current Page: {{ $posts->currentPage() }}</p>
</div>
<div class="mt-4 d-flex justify-content-center">
    {{ $posts->appends(request()->query())->links() }}
</div>
<footer class="text-center my-5" style="background-color: black; color:white">
    <p>&copy; 2024 Blog Kami. All rights reserved.</p>
</footer>
@endsection
