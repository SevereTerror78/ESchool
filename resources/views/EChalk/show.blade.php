@extends('layout')

@section('content')
    <h1>Marks details:</h1>
    
    <a href="{{ route('mark.index') }}">Back</a>
    <div>
        <p><strong>Név:</strong> {{ $mark->name }}</p>
        {{dd($mark)}}
    </div>
@endsection
