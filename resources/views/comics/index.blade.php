@extends('layouts.main')

@section('content')
    <h1>Comics:</h1>

    @if (session('deleted_product'))
        <div class="alert alert-success" role="alert">
            <h3>{{session('deleted_product')}}</h3>
        </div>
        
    @endif

    <div class="Comics-container d-flex flex-wrap">
        @foreach ($Comics as $Comic)
            <div class="card me-4 mb-5" style="width: 18rem;">
                <img src="{{$Comic->image}}" class="card-img-top" alt="...">
    
                <div class="card-body">
                    <h5 class="card-title">{{$Comic->title}}</h5>
                </div>
    
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">category: {{$Comic->type}}</li>
                </ul>

                <div class="card-body d-flex justify-content-between align-items-center">
                    <a href="{{route('Comics.show', $Comic)}}" class="btn btn-success ">Show</a>
                    <a href="{{route('Comics.edit', $Comic)}}" class="btn btn-primary">Edit</a>
                    <form class="d-inline" action="{{route('Comics.destroy', $Comic)}}" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>                
            </div>
        @endforeach
    </div>
@endsection