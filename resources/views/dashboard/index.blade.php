@extends('dashboard.layouts.main')


@section('container')
@if(session('alert'))
        <div class="alert alert-warning">
            {{ session('alert') }}
        </div>
    @endif
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Welcome back {{ Auth::user()->name }} </h1>
  
</div>
@endsection