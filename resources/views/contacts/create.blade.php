<form method="POST" action="{{ route('contacts.store', $person) }}">
    @csrf
    <input type="text" name="country_code" placeholder="Country code" value="{{ old('country_code') }}">
    @error('country_code')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <input type="number" name="number" placeholder="Number" value="{{ old('number') }}">
    @error('number')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="submit">Create Contact</button>
</form>
