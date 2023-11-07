<!-- resources/views/person/index.blade.php -->
@extends('layout')

@section('title', 'Person List')

@section('content')
    <div class="w-full mt-16">
      <div class="w-full mb-5">

        <h1 class="w-full mb-4 text-xl border-b">Persons</h1>

        <a href="{{ route('persons.create') }}"  class="max-w-xs p-2 text-white uppercase bg-green-600">Create New Person</a>
      </div>
        
        <table class="table-auto">
            <thead>
                <tr>
                  <th class="w-1/5 bg-gray-400">Actions</th>
                  <th class="w-1/5 bg-gray-400">ID</th>
                  <th class="w-1/5 bg-gray-400">Name</th>
                  <th class="w-1/5 bg-gray-400">Email</th>
                </tr>
              </thead>
              <tbody>
        @foreach ($persons as $person)
       
        <tr>
            <td class="flex gap-2"><a href="{{ route('persons.show', $person) }}">Show</a>
                <a href="{{ route('persons.edit', $person) }}">Edit</a>

                <form method="POST" action="{{ route('persons.destroy', ['id' => $person->id]) }}">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>

            <td class="text-left">{{ $person->id }}</td>
            <td class="text-left">{{ $person->name }}</td>
            <td class="text-left">{{ $person->email }}</td>

        </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection