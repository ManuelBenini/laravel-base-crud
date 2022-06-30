@extends('layouts.main')

@section('content')
    <h1>{{$Comic->title}}</h1>

    <div class="card mt-4" style="width: 18rem;">
        <img src="{{$Comic->image}}" class="card-img-top" alt="...">

        <div class="card-body">
          <h5 class="card-title">{{$Comic->title}}</h5>
          <p class="card-text">Generic description: Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora dolores tenetur sequi ab eaque a voluptate magnam nulla, quis vero perspiciatis animi quibusdam, quaerat qui optio pariatur adipisci, est doloremque.</p>
        </div>

        <ul class="list-group list-group-flush">
          <li class="list-group-item">Category: {{$Comic->type}}</li>
          <li class="list-group-item">Generic information 2: abcd</li>
          <li class="list-group-item">Generic information 2: efgh</li>
        </ul>

        <div class="card-body">
          <a href="{{route('Comics.edit', $Comic)}}" class="card-link btn btn-primary">Edit</a>
          <form class="d-inline" action="{{route('Comics.destroy', $Comic)}}" method="POST" onsubmit="return confirm('Are you sure?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="card-link btn btn-danger">Delete</button>
          </form>
        </div>
    </div>

    <a href="{{route('Comics.index')}}" class="btn btn-dark mt-5"><< Go back</a>
@endsection