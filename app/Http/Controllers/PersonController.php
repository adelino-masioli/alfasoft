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
        Person::create($request->all());
        return redirect()->route('persons.index');
    }

    public function edit(Person $contact)
    {
        return view('persons.edit', compact('contact'));
    }

    public function update(Request $request, Person $contact)
    {
        $contact->update($request->all());
        return redirect()->route('persons.index');
    }

    public function destroy(Person $contact)
    {
        $contact->delete();
        return redirect()->route('persons.index');
    }
}
