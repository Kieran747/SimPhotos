<?php

namespace App\Http\Controllers;

class AirportsController extends Controller
{
    public function store()
    {
        $airports = new \App\airports();

        $airports->name = request('name');
        $airports->ICAO = request('ICAO');
        $airports->country = request('country');
        $airports->approved = '0';

        $airports->save();


        return redirect('/home');
    }
}
