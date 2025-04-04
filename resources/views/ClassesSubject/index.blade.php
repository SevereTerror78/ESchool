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
                <th>Osztály neve</th>
                <th>Év</th>
                <th>Akciók</th>
            </tr>
        </thead>
        <tbody>
            @foreach($classes as $class)
                <tr>
                    <td>{{ $class->id }}</td>
                    <td>{{ $class->name }}</td>
                    <td>{{ $class->year }}</td>
                    <td>
                        <a href="{{ route('schoolClass.show', $class->id) }}">Részletek</a>

                        @auth
                            <a href="{{ route('schoolClass.edit', $class->id) }}">Módosítás</a>

                            <form action="{{ route('schoolClass.destroy', $class->id) }}" method="POST" style="display:inline;">
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
        <a href="{{ route('schoolClass.create') }}">Új osztály hozzáadása</a>
    @endauth
@endsection
