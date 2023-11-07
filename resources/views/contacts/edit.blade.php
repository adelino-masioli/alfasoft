<form method="POST" action="{{ route('contacts.update', $contact) }}">
    @csrf
    @method('PUT')

    <select name="country_code">
        @foreach($countries as $key => $country)
            @if ($country['idd'])
                <option @if($contact->country_code === $country['idd']) selected @endif value="{{ $country['idd'] }}">{{ $country['name'] }}</option>
            @endif
        @endforeach
    </select>

    @error('country_code')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <input type="number" name="number" value="{{ $contact->number }}">
    @error('number')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="submit">Update Contact</button>
</form>