<form method="POST" action="{{ route('contacts.update', $contact) }}">
    @csrf
    @method('PUT')
    <input type="text" name="country_code" value="{{ $contact->country_code }}">
    @error('country_code')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <input type="number" name="number" value="{{ $contact->number }}">
    @error('number')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="submit">Update Contact</button>
</form>