@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New category</h1>
</div>

<div class="col-lg-8">
    <form method="POST" action="/dashboard/category" >
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">name category</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" oninput="generateSlug('name')" value="{{ old('name') }}">
            @error('name')
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
        
    
        <button type="submit" class="btn btn-primary">Create Category</button>
    </form>
</div>


@endsection
