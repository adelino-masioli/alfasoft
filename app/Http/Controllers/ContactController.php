<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

class ContactController extends Controller
{
    public function create(Person $person)
    {
        $countries = Self::getAllCountries();
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
        $countries = Self::getAllCountries();
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

    public function getAllCountries()
    {
        $response =  Http::get('https://restcountries.com/v3.1/all')->json();
        $countries = collect($response)
                    ->sortBy('name.common')
                    ->map(function ($item) {
                        return [
                            'name' => $item['name']['common'],
                            'idd' =>  $item['idd'] ? preg_replace('/\D/', '', $item['idd']["root"].$item['idd']["suffixes"][0]) : null,
                        ];
                    })
                    ->values()
                    ->all();

        return $countries;
    }

    public function getCountry($name)
    {
        $response =  Http::get("https://restcountries.com/v3.1/name/{$name}")->json();
        $root     = $response[0]['idd']['root'];
        $suffixes = $response[0]['idd']['suffixes'][0];
        return preg_replace('/\D/', '', $root.$suffixes);
    }
}
