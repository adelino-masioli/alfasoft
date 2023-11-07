<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create(Person $person)
    {
        return view('contacts.create', compact('person'));
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
        return view('contacts.edit', compact('contact'));
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
