@extends('layout')

@section('content')
    <h1>Details></h1>
    <div>
        <p><strong>Name:</strong> {{ $class->name }}</p>
        <p><strong>Year:</strong> {{ $class->year }}</p>
    </div>
    <a href="{{ route('SchoolClass.index') }}">Back</a>
@endsection
