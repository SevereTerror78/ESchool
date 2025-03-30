@extends('layout')

@section('content')
    <h1>Új jegy hozzáadása</h1>

    <form action="{{ route('mark.store') }}" method="POST">
        @csrf
        <div>
            <label for="student_id">Tanuló</label>
            <select name="student_id" id="student_id" required>
                <option value="">Válassz tanulót</option>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div>
            <label for="subject_id">Tantárgy</label>
            <select name="subject_id" id="subject_id" required>
                <option value="">Válassz tantárgyat</option>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="marks">Jegy</label>
            <input type="text" name="marks" id="marks" required>
        </div>

        <div>
            <button type="submit">Jegy hozzáadása</button>
        </div>
        <a href="{{ route('mark.index') }}">Back</a>
    </form>
@endsection
