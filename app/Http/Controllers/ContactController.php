<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Contact;
use App\Services\CountryService;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    public function create(Person $person)
    {
        $countries = CountryService::getAllCountries();
        return view('contacts.create', compact('person', 'countries'));
    }

    public function store(Request $request, Person $person)
    {
        $data = $request->validate([
            'country_code' => 'required',
            'number'       => 'required|digits:9',
        ]);
        $data['person_id'] = $person->id;
        $person->contacts()->create($data);
     
        return redirect()->route('persons.show', $person);
    }

    public function edit(Contact $contact)
    {
        $countries = CountryService::getAllCountries();
        return view('contacts.edit', compact('contact', 'countries'));
    }

    public function update(Request $request, Contact $contact)
    {
        $data = $request->validate([
            'country_code' => 'required',
            'number'       => 'required|digits:9',
        ]);
        $contact->update($data);
        return redirect()->route('persons.show', $contact->person_id);
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('persons.show', $contact->person_id);
    }
}
