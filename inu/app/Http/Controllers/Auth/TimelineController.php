<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    public function showTimelinePage()
    {
        return view('auth.timeline'); // resource/views/auth/timeline.blade.phpを表示する
    }

    public function postTweet(Request $request) //ここはあとで実装します。(Requestはpostリクエストを取得するためのものです。)
    {

    }
}
