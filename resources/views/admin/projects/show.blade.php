@extends('layouts.app')

@section('content')
  <h1 class="text-center my-4">Details for the project: {{ $project->name }}</h1>

  <div class="container">
    <div class="card mb-3">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="{{ asset('storage/' . $project->cover_image) }}" class="img-fluid rounded-start"
            alt="{{ $project->name }}">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h6 class="card-title">{{ $project->original_cover_image_name }}</h6>
            <h5 class="card-title">{{ $project->name }}</h5>
            <h5 class="card-title">Type: {{ $project->type?->name }}</h5>
            <h5 class="card-title">{{ $project->client_name }}</h5>
            <p class="card-text mb-5">{{ $project->summary }}</p>
            @if ($project->technologies)
              @foreach ($project->technologies as $tech)
                <span class="btn btn-info">{{ $tech->name }}</span>
              @endforeach
            @endif
            <div class="actions d-flex">
              <a href="{{ route('admin.project.edit', $project) }}" class="btn btn-primary">Edit this
                project</a>
              <form action="{{ route('admin.project.destroy', $project) }}" method="POST"
                onclick="return confirm('Do you really want to delete this project?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete this project</button>
              </form>
              <a href="{{ route('admin.project.index') }}" class="btn btn-info">Back to all
                projects</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
