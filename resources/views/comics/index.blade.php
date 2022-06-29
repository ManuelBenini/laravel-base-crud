@extends('layouts.main')

@section('content')
    <h1>Tutti i fumetti:</h1>

    <div class="comics-container d-flex flex-wrap">
        @foreach ($comics as $comic)
            <div class="card me-4 mb-5" style="width: 18rem;">
                <img src="{{$comic->image}}" class="card-img-top" alt="...">
    
                <div class="card-body">
                    <h5 class="card-title">{{$comic->title}}</h5>
                </div>
    
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">category: {{$comic->type}}</li>
                </ul>

                <div class="card-body">
                    <a href="{{route('Comics.show', $comic)}}" class="card-link btn btn-success ">Select</a>
                    <a href="#" class="card-link btn btn-primary">Edit</a>
                    <a href="#" class="card-link btn btn-danger">Delete</a>
                </div>                
            </div>
        @endforeach
    </div>
@endsection