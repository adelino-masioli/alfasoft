<form method="POST" action="{{ route('contacts.store', $person) }}">
    @csrf
    
    <select name="country_code">
        @foreach($countries as $key => $country)
            @if ($country['idd'])
                <option value="{{ $country['idd'] }}">{{ $country['name'] }}</option>
            @endif
        @endforeach
    </select>

    @error('country_code')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <input type="number" name="number" placeholder="Number" value="{{ old('number') }}">
    @error('number')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="submit">Create Contact</button>
</form>
