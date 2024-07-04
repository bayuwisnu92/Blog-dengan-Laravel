@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">My Post</h1>
</div>

<div class="table-responsive small">
  <a href="/dashboard/posts/create" class="btn btn-dark btn-sm mb-3">New Post</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Category</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($posts as $post)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $post->title }}</td>
        <td>{{ $post->category->name }}</td>
        <td>
            <a href="/dashboard/posts/{{ $post->id }}" class="badge bg-primary text-decoration-none"><i class="bi bi-eye"></i></a>
            <a href="/dashboard/posts/{{ $post->id }}/edit" class="badge bg-warning text-decoration-none"><i class="bi bi-pencil-square"></i></a>
            <form action="/dashboard/posts/{{ $post->id }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
              @method('delete')
              @csrf
              <button type="submit" class="badge bg-danger border-0"><i class="bi bi-x-square"></i></button>
            </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
