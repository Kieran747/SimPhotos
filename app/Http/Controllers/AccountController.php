<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\users;

class AccountController extends Controller
{
    public function picture(request $request)
    {

        $request->validate([
            'file' => 'mimes:jpeg,bmp,png',
        ]);

        $account_picture = users::where('id', request('id'))->first();
        $image = $request->file('file');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/images/accounts/', $filename);
        $account_picture->account_photo = $filename;

        $account_picture->update();

        return back();
    }

    public function update()
    {
        $account = users::where('id', request('id'))->first();

        $account->name = request('name');
        $account->email = request('email');
        $account->bio = request('bio');

        $account->update();

        return back();
    }
}
