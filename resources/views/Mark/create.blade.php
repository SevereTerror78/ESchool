@extends('layout')

@section('content')
    <h1>New mark</h1>

    <form action="{{ route('mark.store') }}" method="POST">
        @csrf
        <div>
            <label for="student_id">Student</label>
            <select name="student_id" id="student_id" required>
                <option value="">None</option>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div>
            <label for="subject_id">Subject</label>
            <select name="subject_id" id="subject_id" required>
                <option value="">None</option>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="marks">Mark</label>
            <input type="text" name="marks" id="marks" required>
        </div>

        <div>
            <button type="submit">Add</button>
        </div>
        <a href="{{ route('mark.index') }}">Back</a>
    </form>
@endsection
