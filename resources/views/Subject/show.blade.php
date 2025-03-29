@extends('layout')

@section('content')
    <h1>Subject details:</h1>
    
    <a href="{{ route('subject.index') }}">Back</a>
    <div>
        <p><strong>Név:</strong> {{ $subject->name }}</p>
        {{dd($subject)}}
    </div>
@endsection
