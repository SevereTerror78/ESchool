@extends('layout')

@section('content')
    <h1>Student details:</h1>
    
    <a href="{{ route('student.index') }}">Back</a>
    <div>
        <p><strong>Név:</strong> {{ $student->name }}</p>
        {{dd($student)}}
    </div>
@endsection
