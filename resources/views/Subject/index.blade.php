@extends('layout')

@section('content')
    <h1>Subject list</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Subject</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subjects as $subject)
                <tr>
                    <td>{{ $subject->id }}</td>
                    <td>{{ $subject->name }}</td>
                    <td>
                        <a href="{{ route('subject.show', $subject->id) }}"><i class="fa-solid fa-list-ul"></i></a>

                        @auth
                            <a href="{{ route('subject.edit', $subject->id) }}"><i class="fa-solid fa-gear"></i></a>

                            <form action="{{ route('subject.destroy', $subject->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Biztosan törölni szeretnéd az osztályt?')" style="border:none; background:none; cursor:pointer;">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        @endauth
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @auth
        <a href="{{ route('subject.create') }}">Új osztály hozzáadása</a>
    @endauth
@endsection
