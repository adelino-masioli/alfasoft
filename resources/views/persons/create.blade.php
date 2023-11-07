
@extends('layout')

@section('title', 'Person Edit')

@section('content')

  
    <div class="w-full mt-16">
        <div class="w-full mb-5">

            <h1 class="w-full mb-4 text-xl border-b">Create new person</h1>
        
            <a href="{{ route('persons.index') }}"  class="max-w-xs p-2 text-white uppercase bg-blue-600">Back</a>
          </div>
          
        <form class="flex flex-col gap-3" method="POST" action="{{ route('persons.store') }}">
            @csrf
            <input type="text" name="name" placeholder="Name">
            @error('name')
                <div class="text-red-600">{{ $message }}</div>
            @enderror

            <input type="text" name="email" placeholder="Email">

            @error('email')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
            
            <button type="submit" class="max-w-xs p-2 text-white uppercase bg-green-600">Create Person</button>
        </form>
    </div>
@endsection
