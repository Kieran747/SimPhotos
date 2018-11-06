<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotosController extends Controller
{
    public function store(request $request)
    {
        $photos = new \App\photos();

        if (request('status') == 'airborn') {
            $photos->country = request('country');
            $photos->airport = '#';
        } else if (request('status') == 'ground'){
            $photos->airport = request('airport');
            $photos->country = '#';
        }

        $photos->registration = request('registration');
        $photos->date = request('date');
        $photos->remarks = request('remarks');
        $photos->aircraft = request('aircraft');
        $photos->airline = request('airline');
        $photos->SELCAL = request('SELCAL');
        $photos->user = request('user');
        $photos->likes = '0';
        $photos->simulator = request('simulator');
        $photos->status = request('status');
        $photos->users_name = request('users_name');

        $image = $request->file('file');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/images/', $filename);
        $photos->link = $filename;

        $photos->save();


        return redirect('/');
    }
}
