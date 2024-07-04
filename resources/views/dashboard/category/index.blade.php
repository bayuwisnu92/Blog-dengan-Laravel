@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">My category</h1>
</div>

<div class="table-responsive small">
  <a href="/dashboard/category/create" class="btn btn-dark btn-sm mb-3">New category</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">name category</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categories as $category)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $category->name }}</td>
        <td>
            <a href="/dashboard/category/{{ $category->id }}/edit" class="badge bg-warning text-decoration-none"><i class="bi bi-pencil-square"></i></a>
            <form action="/dashboard/category/{{ $category->id }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
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
