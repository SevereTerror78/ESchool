@extends('layout')

@section('content')
    <h1>Osztályok listája</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Student</th>
                <th>class</th>
                <th>Sex</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->schoolClass->name }}</td> 
                    <td>{{ $student->sex }}</td>
                    <td>
                        <a href="{{ route('student.show', $student->id) }}">Részletek</a>

                        @auth
                            <a href="{{ route('student.edit', $student->id) }}">Módosítás</a>

                            <form action="{{ route('student.destroy', $student->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Biztosan törölni szeretnéd az osztályt?')">Törlés</button>
                            </form>
                        @endauth
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @auth
        <a href="{{ route('student.create') }}">Új osztály hozzáadása</a>
    @endauth
@endsection
