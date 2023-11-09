<!-- resources/views/person/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Person List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                        <div class="w-full mb-5">

                              <a href="{{ route('persons.create') }}">
                                <x-primary-button>{{ __('Create New Person') }}</x-primary-button>
                              </a>
                        </div>

                        @if ($persons->count() > 0)
                        <table class="w-full table-auto">
                            <thead>
                                <tr>
                                    <th class="w-1/4 p-2 border-b border-gray-400">Actions</th>
                                    <th class="w-1/6 p-2 border-b border-gray-400">ID</th>
                                    <th class="w-1/3 p-2 border-b border-gray-400">Name</th>
                                    <th class="w-1/3 p-2 border-b border-gray-400">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($persons as $person)
                                    <tr >
                                        <td class="flex gap-2 p-2">
                                          <a href="{{ route('persons.show', $person) }}">
                                            <x-primary-button>
                                              {{ __('Show') }}
                                            </x-primary-button>
                                          </a>
                                            <a href="{{ route('persons.edit', $person) }}">
                                              <x-secondary-button>
                                                {{ __('Edit') }}
                                              </x-secondary-button>
                                            </a>

                                            <form method="POST"
                                                action="{{ route('persons.destroy', ['id' => $person->id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <x-danger-button>
                                                  {{ __('Delete') }}
                                                </x-danger-button>
                                            </form>
                                        </td>

                                        <td class="text-left">{{ $person->id }}</td>
                                        <td class="text-left">{{ $person->name }}</td>
                                        <td class="text-left">{{ $person->email }}</td>

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
