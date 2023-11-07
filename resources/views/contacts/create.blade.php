@extends('layout')

@section('title', 'Person Edit')

@section('content')

  
    <div class="w-full mt-16">
        <div class="w-full mb-5">

            <h1 class="w-full mb-4 text-xl border-b">Create new contact</h1>
        
            <a href="{{ route('persons.show', $person->id) }}"  class="max-w-xs p-2 text-white uppercase bg-blue-600">Back</a>
          </div>
          
        <form class="flex flex-col gap-3" method="POST" action="{{ route('contacts.store', $person) }}">
            @csrf
            
            <select name="country_code">
                @foreach($countries as $key => $country)
                    @if ($country['idd'])
                        <option value="{{ $country['idd'] }}">{{ $country['name'] }}</option>
                    @endif
                @endforeach
            </select>
        
            @error('country_code')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        
            <input type="number" name="number" placeholder="Number" value="{{ old('number') }}">
            @error('number')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
            
            <button type="submit" class="max-w-xs p-2 text-white uppercase bg-green-600">Create Contact</button>
        </form>
    </div>
@endsection
