@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Dashboard') }}</div>

          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <p>You are logged in, {{ Auth::user()->name }}</p>
            <p>Your email is: {{ Auth::user()->email }}</p>
            <p>Your encrypted password is: {{ Auth::user()->password }}</p>
            <p>Click <a href="{{ route('admin.project.index') }}">here</a> to look at your projects, or
              <a href="{{ route('admin.project.create') }}">here</a>
              to create a new one</p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
