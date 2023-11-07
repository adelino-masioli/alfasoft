<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index()
    {
        $persons = Person::all();
        return view('persons.index', compact('persons'));
    }

    public function create()
    {
        return view('persons.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'  => 'required',
            'email' => 'email|required',
        ]);

        Person::create($data);
        return redirect()->route('persons.index');
    }

    public function show(Person $person)
    {
        $contacts = $person->find($person->id)->contacts;
        return view('persons.show', compact('person', 'contacts'));
    }

    public function edit(Person $person)
    {
        return view('persons.edit', compact('person'));
    }

    public function update(Request $request, Person $person)
    {
        $data = $request->validate([
            'name'  => 'required',
            'email' => 'email|required',
        ]);
        $person->update($data);
        return redirect()->route('persons.index');
    }

    public function destroy($id)
    {
        $person = Person::findOrFail($id);
        $person->delete();
        return redirect()->route('persons.index');
    }
}
