<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function picture(request $request)
    {
        $account_picture = new \App\users();

        $request->validate([
            'file' => 'mimes:jpeg,bmp,png',
        ]);

        $image = $request->file('profile_picture');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/images/accounts/', $filename);
        $account_picture->link = $filename;

        $account_picture->save();


        return redirect('/');
    }
}
