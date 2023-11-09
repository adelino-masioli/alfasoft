<!-- resources/views/persons/show.blade.php -->

<h1>Person Details</h1>


<p>Name: {{ $person->name }}</p>
<p>Email: {{ $person->email }}</p>

<a href="{{ route('contacts.create', $person) }}">Add Contact</a>

@foreach ($contacts as $contact)
    <p>
        <a href="{{ route('contacts.edit', $contact) }}">Edit</a>

        <form method="POST" action="{{ route('contacts.destroy', ['id' => $contact->id]) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>

        {{ $contact->id }} - {{ $contact->country_code }} - {{ $contact->number }}</p>
@endforeach

<!-- Add more details as needed -->
