@extends('layouts.main')

@section('container')
<div class="container mt-4">
    <h1 class="mb-4">All {{ $title }}</h1>

    <div class="row">
        @foreach ($categories as $category)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h3 class="card-title">
                        <a href="/categories/{{ $category->slug }}" class="text-decoration-none text-center">{{ $category->name }}</a>
                    </h3>
                    
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
