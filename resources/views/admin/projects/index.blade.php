@extends('layouts.app')

@section('content')
  <div class="container">
    <h1 class="text-center">All of your projects</h1>
    @if (session('deleted'))
      <h2>{{ session('deleted') }}</h2>
    @endif
    <a href="{{ route('admin.project.create') }}" class="btn btn-primary">Create a new Project</a>
  </div>

  <div class="container">

    <div class="row row-cols-3">
      @foreach ($projects as $project)
        <div class="col p-1">
          <div class="card">
            <img src="{{ asset('storage/' . $project->cover_image) }}" class="card-img-top"
              alt="{{ $project->name }}">
            <div class="card-body">
              <h5 class="card-title">{{ $project->name }}</h5>
              <h5 class="card-title">{{ $project->client_name }}</h5>
              <p class="card-text">{{ $project->summary }}</p>
              <a href="{{ route('admin.project.show', $project) }}" class="btn btn-primary">Look at
                the project</a>
            </div>
          </div>
        </div>
      @endforeach

    </div>
  </div>
@endsection
