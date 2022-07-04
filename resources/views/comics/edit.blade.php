@extends('layouts.main')

@section('content')
    <h1>Edit {{$Comic->title}}</h1>

    {{-- @dd($Comic->type) --}}

    {{-- validation --}}
    <div class="alert-danger">

      @if ($errors->any())
        <ul>

          @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach

        </ul>
      @endif

    </div>

    <form action="{{route('Comics.update', $Comic)}}" method="POST">
        @csrf
        {{-- Se il Method è PUT|PATCH|DELETE nel tag form inserire method='POST' e aggiungere il @method in blade --}}
        @method('PUT')
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input
          type="text" 
          value="{{old('title', $Comic->title)}}"
          class="form-control @error('title') is-invalid @enderror" 
          name="title" id="title" aria-describedby="emailHelp">
          @error('title')
            <p class="error-msg">{{$message}}</p>
          @enderror
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Cover image link</label>
          <input 
          type="text" 
          value="{{old('image', $Comic->image)}}" 
          class="form-control @error('image') is-invalid @enderror" 
          name="image" id="image">
          @error('image')
            <p class="error-msg">{{$message}}</p>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label" for="type">Select Comic type</label>
          <select name="type" id="type">
            <option value="Comic book" {{$Comic->type === 'Comic book' ? 'selected' : ''}}> Comic book</option>
            <option value="graphic novel" {{$Comic->type === 'graphic novel' ? 'selected' : ''}}>Graphic novel</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection