<form method="POST" action="{{ route('persons.store') }}">
    @csrf
    <input type="text" name="name" placeholder="Name">
    <input type="text" name="email" placeholder="Email">
    <button type="submit">Create Person</button>
</form>
