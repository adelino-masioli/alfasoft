<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Services\CountryService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        $countries = CountryService::getAllCountries();
        return view('dashboard', compact('contacts', 'countries'));
    }

    public function filter(Request $request)
    {
        return redirect()->route('dashboard.results', $request->country_code);
    }

    public function result($country)
    {
        $countries = CountryService::getAllCountries();
        $contacts = Contact::where('country_code', $country)->get();
        return view('dashboard', compact('contacts', 'countries'));
    }
}
