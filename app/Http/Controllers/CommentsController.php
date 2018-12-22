<?php

namespace App\Http\Controllers;


class CommentsController extends Controller
{
    public function store()
    {
        $comment = new \App\comments();

        $comment->value = request('value');
        $comment->user_id = request('user_id');
        $comment->photo_id = request('photo_id');
        $comment->photo_id = request('photo_id');
        $comment->name = request('user_name');
        $comment->account_photo = request('account_photo');

        $comment->save();


        return back();
    }
}
