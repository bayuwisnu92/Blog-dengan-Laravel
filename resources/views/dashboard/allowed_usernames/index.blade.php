@extends('dashboard.layouts.main')

@section('container')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h1 class="mb-4">Menambahkan username admin</h1>
    
            <form action="{{ route('allowed_usernames.store') }}" method="POST" class="form-inline mb-4">
                @csrf
                <div class="form-group mr-2">
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                </div>
                <button type="submit" class="btn btn-primary btn-sm mt-3"><i class="bi bi-plus-circle"></i> Username</button>
            </form>
        
            <div class="table-responsive small">
                
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">name Username</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($allowedUsernames as $username)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $username }}</td>
                      <td>
                        <form action="{{ route('allowed_usernames.destroy', $username) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>

        </div>
        </div>
    </div>
   

   

@endsection
