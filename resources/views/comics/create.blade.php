@extends('layouts.main')

@section('content')
    <h1>Create a new comic</h1>

    <form action="{{route('Comics.store')}}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Cover image link</label>
          <input type="text" class="form-control" name="image" id="image">
        </div>
        <div class="mb-3">
          <label class="form-label" for="type">Select comic type</label>
          <select name="type" id="type">
            <option value="comic_book"> Comic book</option>
            <option value="graphic_novel">Graphic novel</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection