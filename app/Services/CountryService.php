<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CountryService {
 
    public static function getAllCountries()
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