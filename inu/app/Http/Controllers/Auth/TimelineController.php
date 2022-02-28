<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; // <--- 追加
use \App\Models\tweet; // <--- 追加


class TimelineController extends Controller
{
    public function showTimelinePage()
    {
        $tweets = tweet::latest()->get();  // <--- 追加
        return view('auth.timeline',compact('tweets'));   // <--- 変更
    }

    public function postTweet(Request $request) //ここはあとで実装します。(Requestはpostリクエストを取得するためのものです。)
    {
        
        $validator = $request->validate([
            'tweet' => ['required', 'string', 'max:280'],
        ]);
        tweet::create([
            'user_id' => Auth::user()->id,
            'tweet' => $request->tweet,
        ]);
        return back();
    }

    }

