@extends('layout')

@section('content')
    <h1>Osztály részletei</h1>
    <div>
        <p><strong>Név:</strong> {{ $class->name }}</p>
        <p><strong>Év:</strong> {{ $class->year }}</p>
    </div>
    <a href="{{ route('SchoolClass.index') }}">Vissza a listához</a>
@endsection
