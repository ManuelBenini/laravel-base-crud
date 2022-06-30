@extends('layouts.main')

@section('content')
        <h2>Errore 404</h2>
        <h3>{{$exception->getMessage()}}</h3>
@endsection