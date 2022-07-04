@extends('layouts.main')

@section('content')
    <h1>Create a new comic</h1>

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

    <form action="{{route('Comics.store')}}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" aria-describedby="emailHelp" value="{{old('title')}}">
          @error('title')
            <p class="error-msg">{{$message}}</p>
          @enderror
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Cover image link</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" name="image" id="image" value="{{old('image')}}">
          @error('image')
            <p class="error-msg">{{$message}}</p>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label" for="type">Select comic type</label>
          <select name="type" id="type" value="{{old('type')}}">
            <option value="Comic book"> Comic book</option>
            <option value="Graphic novel">Graphic novel</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection