<form method="POST" action="{{ route('persons.update', $person) }}">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $person->name }}">
    <input type="text" name="email" value="{{ $person->email }}">
    <button type="submit">Update Person</button>
</form>