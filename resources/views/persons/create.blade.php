<form method="POST" action="{{ route('persons.store') }}">
    @csrf
    <input type="text" name="name" placeholder="Name">
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <input type="text" name="email" placeholder="Email">

    @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="submit">Create Person</button>

</form>
