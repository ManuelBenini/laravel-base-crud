@extends('layouts.main')

@section('content')
    <h1>Edit {{$Comic->title}}</h1>

    {{-- @dd($Comic->type) --}}

    <form action="{{route('Comics.update', $Comic)}}" method="POST">
        @csrf
        {{-- Se il Method è PUT|PATCH|DELETE nel tag form inserire method='POST' e aggiungere il @method in blade --}}
        @method('PUT')
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" value="{{$Comic->title}}" class="form-control" name="title" id="title" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Cover image link</label>
          <input type="text" value="{{$Comic->image}}" class="form-control" name="image" id="image">
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