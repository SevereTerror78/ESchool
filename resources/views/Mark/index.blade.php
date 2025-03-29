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
                <th>Tanuló</th>
                <th>Tantárgy</th>
                <th>Jegy</th>
                <th>Akciók</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($marks as $mark)
                <tr>
                    <td>{{ $mark->student->name }}</td> 
                    <td>{{ $mark->subject->name }}</td> 
                    <td>{{ $mark->marks }}</td> 
                    <td>
                        <a href="{{ route('mark.show', $mark->id) }}">Megtekintés</a>
                        @auth
                            <a href="{{ route('mark.edit', $mark->id) }}">Módosítás</a>

                            <form action="{{ route('mark.destroy', $mark->id) }}" method="POST" style="display:inline;">
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
        <a href="{{ route('mark.create') }}">Új osztály hozzáadása</a>
    @endauth
@endsection
