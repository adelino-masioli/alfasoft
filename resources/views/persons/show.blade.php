@extends('layout')

@section('title', 'Person Edit')

@section('content')


    <div class="w-full mt-16">
        <div class="w-full mb-5">

            <h1 class="w-full mb-4 text-xl border-b">Person Details</h1>

            <a href="{{ route('persons.index') }}" class="max-w-xs p-2 text-white uppercase bg-blue-600">Back</a>
        </div>


        <div class="flex flex-col mb-4">
            <p>Name: {{ $person->name }}</p>
            <p>Email: {{ $person->email }}</p>
        </div>

        <div class="w-full mb-5">
            <a href="{{ route('contacts.create', $person) }}" class="max-w-xs p-2 text-white uppercase bg-green-600">Add
                Contact</a>
        </div>


        <table class="table-auto">
            <thead>
                <tr>
                    <th class="w-1/5 bg-gray-400">Actions</th>
                    <th class="w-1/5 bg-gray-400">ID</th>
                    <th class="w-1/5 bg-gray-400">Country Code</th>
                    <th class="w-1/5 bg-gray-400">Number</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td class="flex gap-2">
                            <a href="{{ route('contacts.edit', $contact) }}">Edit</a>

                            <form method="POST" action="{{ route('contacts.destroy', ['id' => $contact->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>

                        <td class="text-left">{{ $contact->id }}</td>
                        <td class="text-left">{{ $contact->country_code }}</td>
                        <td class="text-left">{{ $contact->number }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
