<?php

namespace App\Http\Controllers;


class AirlinesController extends Controller
{
    public function store()
    {
        $airlines = new \App\airlines();

        $airlines->name = request('name');
        $airlines->category = request('category');
        $airlines->virtual = request('virtual');
        $airlines->approved = '0';
        $airlines->logo = '#';

        $airlines->save();


        return redirect('/home');
    }
}
