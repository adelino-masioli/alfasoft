<!-- resources/views/person/index.blade.php -->
@extends('layout')

@section('title', 'Person List')

@section('content')
    @foreach ($persons as $person)
    <p>{{ $person->id }} - {{ $person->name }} - {{ $person->email }}</p>
    @endforeach
@endsection