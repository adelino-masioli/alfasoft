<!-- resources/views/person/index.blade.php -->
@extends('layout')

@section('title', 'Person List')

@section('content')
    @foreach ($persons as $person)
    <p>
        <a href="{{ route('persons.show', $person) }}">Show</a>
        <a href="{{ route('persons.edit', $person) }}">Edit</a>

        <form method="POST" action="{{ route('persons.destroy', ['id' => $person->id]) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>

        {{ $person->id }} - {{ $person->name }} - {{ $person->email }}</p>
    @endforeach
@endsection