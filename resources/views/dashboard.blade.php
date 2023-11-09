<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form class="flex flex-col gap-3" method="POST"
                            action="{{ route('dashboard.filter') }}">
                            @csrf
                    <div class="flex items-end w-1/3 gap-5 mb-5">
                        <div class="flex-1">
                            <x-input-label for="country_code" :value="__('Select a country to filter')" />
                            <select name="country_code" id="country_code" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                @foreach ($countries as $key => $country)
                                    @if ($country['idd'])
                                        <option value="{{ $country['idd'] }}">{{ $country['name'] }} ({{ $country['idd'] }})</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="max-w-[100px]">
                            <x-primary-button class="py-3">{{ __('Filter') }}</x-primary-button>
                        </div>
                    </div>
                    </form>
                    
                    @if ($contacts->count() > 0)
                    <table class="w-full table-auto">
                        <thead>
                            <tr>
                                <th class="w-1/6 p-2 border-b border-gray-400">ID</th>
                                <th class="w-1/3 p-2 border-b border-gray-400">Country Code</th>
                                <th class="w-1/3 p-2 border-b border-gray-400">Number</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($contacts as $contact)
                                    <tr>

                                        <td class="p-2 text-center">{{ $contact->id }}</td>
                                        <td class="text-left">({{ $contact->country_code }})</td>
                                        <td class="text-left">{{ $contact->number }}</td>

                                    </tr>
                                @endforeach
                        </tbody>
                    </table>

                    @else
                        <div>
                            <p class="p-2 text-center border-t border-b border-gray-100">No records found</p>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
