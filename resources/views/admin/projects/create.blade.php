@extends('layouts.app')

@section('content')
  <div class="container">
    <h1 class="text-center">Create a new project</h1>
    @if ($errors->any())
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif
    <form action="{{ route('admin.project.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      {{-- Project Name --}}
      <div class="mb-3">
        <label for="name" class="form-label fw-bold">Project Name</label>
        <input type="text" name="name" class="form-control" id="name"
          placeholder="The name of your project" value="{{ old('name') }}">
      </div>

      {{-- Image upload --}}
      <div class="mb-3">
        <label for="cover_image" class="form-label fw-bold">Project Cover Image</label>
        <input type="file" onchange="showImage(event)" name="cover_image" class="form-control"
          id="cover_image">
      </div>

      {{-- Types Select --}}
      <div class="mb-3">
        <select name="type_id" id="types" class="form-select">
          <option value="">Select an option</option>
          @foreach ($types as $type)
            <option @if ($type->id == old('type_id')) selected @endif value="{{ $type->id }}">
              {{ $type->name }}</option>
          @endforeach
        </select>
      </div>

      {{-- Technolgies Checkbox --}}
      <div class="mb-3">
        @foreach ($technologies as $technology)
          <label for="{{ $technology->slug }}">{{ $technology->name }}</label>
          <input type="checkbox" id="{{ $technology->slug }}" value="{{ $technology->id }}"
            name="technologies[]">
        @endforeach
      </div>

      {{-- Thumbnail preview of uploaded image --}}
      <div>
        <img src="" width="150" alt="" id="uploaded_image">
      </div>

      {{-- Project client name --}}
      <div class="mb-3">
        <label for="client_name" class="form-label fw-bold">Project Client Name</label>
        <input id="client_name" type="text" name="client_name" class="form-control"
          placeholder="The name of the client of this project" value="{{ old('client_name') }}">
      </div>

      {{-- Project summary --}}
      <div class="mb-3">
        <label for="summary" class="form-label fw-bold">Project Summary</label>
        <textarea name="summary" id="summary" cols="30" rows="10" class="form-control">{{ old('summary') }}</textarea>
      </div>


      <button class="btn btn-info">Salva</button>
    </form>
  </div>

  <script>
    function showImage(event) {
      console.log(event)
      const thumb = document.getElementById('uploaded_image');
      thumb.src = URL.createObjectURL(event.target.files[0]);
    }
  </script>
@endsection
