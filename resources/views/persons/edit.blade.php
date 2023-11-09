<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Person Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="w-full mb-5">

                        <a href="{{ route('persons.index') }}" class="max-w-xs text-gray-800">&larr; Back</a>
                    </div>
                    <div class="max-w-xl">
                        <form class="flex flex-col gap-3" method="POST"
                            action="{{ route('persons.update', $person) }}">
                            @csrf
                            @method('PUT')
        
                            
                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" name="name" type="text" value="{{ $person->name }}" placeholder="Name"
                                    class="block w-full mt-1" autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            
                            <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" name="email" type="email" value="{{ $person->email }}" placeholder="Email"
                                    class="block w-full mt-1" autocomplete="email" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
