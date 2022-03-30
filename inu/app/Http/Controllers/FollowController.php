<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\User;


class FollowController extends Controller
{
    public function follow(Request $request, $id)
    {
        \Auth::user()->follow($id);
        return back();
    }

    public function unfollow($id) {
        \Auth::user()->unfollow($id);
            return back();
    }


}