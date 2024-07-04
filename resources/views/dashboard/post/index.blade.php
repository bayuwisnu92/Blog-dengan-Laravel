@extends('dashboard.layouts.main')


@section('container')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-9">
            <h1 class="mb-3">{{ $title }}</h1>
            <img src="{{ asset('storage/'. $post->image) }}" alt="" width="800px" class="d-block">
                <a href="/dashboard/posts" class="btn btn-sm"><i class="bi bi-skip-backward-circle-fill"></i>kembali</a>
            <a href="" class="btn btn-sm"><i class="bi bi-pencil-square"></i> edit</a>
            
            <form action="/dashboard/posts/{{ $post->id }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-sm"><i class="bi bi-x-square"></i></button>
              
             </form>
            <h3 class="mb-4">{{ $post->title }}</h3>
            <div class="mb-5">
                {!! $post->body !!}
            </div>
            <a href="{{ $title === 'Single Post' ? '/blog' : '/dashboard/posts' }}" >
                <i class="bi bi-arrow-left"></i> Kembali
            </a>

        </div>
    </div>
    
</div>   
@endsection