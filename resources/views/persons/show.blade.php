<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Person Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">


                    <div class="w-full mb-5">


                        <a href="{{ route('persons.index') }}" class="max-w-xs text-gray-800">&larr; Back</a>
                    </div>


                    <table class="w-full table-auto">
                        <table>
                            <tbody>
                                <tr>
                                    <td class="min-w-[60px] font-semibold">Name:</td>
                                    <td>{{ $person->name }}</td>
                                </tr>
                                <tr>
                                    <td class="min-w-[60px] font-semibold">Email:</td>
                                    <td>{{ $person->email }}</td>
                                </tr>
                            </tbody>
                        </table>


                        <div class="w-full mt-5 mb-5">
                            <a href="{{ route('contacts.create', $person) }}">
                                <x-primary-button>{{ __('Add Contact') }}</x-primary-button>
                            </a>
                        </div>


                        <table class="w-full table-auto">
                            <thead>
                                <tr>
                                    <th class="w-1/4 p-2 border-b border-gray-400">Actions</th>
                                    <th class="w-1/6 p-2 border-b border-gray-400">ID</th>
                                    <th class="w-1/3 p-2 border-b border-gray-400">Country Code</th>
                                    <th class="w-1/3 p-2 border-b border-gray-400">Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <td class="flex gap-2 p-2">
                                            <a href="{{ route('contacts.edit', $contact) }}">
                                                <x-secondary-button>
                                                    {{ __('Edit') }}
                                                </x-secondary-button>
                                            </a>

                                            <form method="POST"
                                                action="{{ route('contacts.destroy', ['id' => $contact->id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <x-danger-button>
                                                    {{ __('Delete') }}
                                                </x-danger-button>
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
            </div>
        </div>
    </div>
</x-app-layout>
