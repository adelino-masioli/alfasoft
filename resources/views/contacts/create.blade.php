<!-- resources/views/person/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Contact Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="w-full mb-5">

                        <a href="{{ route('persons.show', $person->id) }}" class="max-w-xs text-gray-800">&larr; Back</a>
                    </div>
                    <div class="max-w-xl">


                        <form class="flex flex-col gap-3" method="POST"
                            action="{{ route('contacts.store', $person) }}">
                            @csrf
                                <div class="flex w-full gap-6">
                                    <div class="flex-1">
                                        <x-input-label for="country_code" :value="__('Country code')" />
                                        <select name="country_code" id="country_code" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                            @foreach ($countries as $key => $country)
                                                @if ($country['idd'])
                                                    <option value="{{ $country['idd'] }}">{{ $country['name'] }} ({{ $country['idd'] }})</option>
                                                @endif
                                            @endforeach
                                        </select>
                                   

                                        @error('country_code')
                                            <div class="text-red-600">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="max-w-[200px]">
                                        <x-input-label for="number" :value="__('Number')" />
                                        <x-text-input id="number" name="number" type="number" value="{{ old('number') }}" placeholder="Number"
                                            class="block w-full mt-1" autocomplete="number" />
                                        <x-input-error :messages="$errors->get('number')" class="mt-2" />
                                    </div>
                                </div>

                            <div class="flex items-center gap-4 mt-3">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
