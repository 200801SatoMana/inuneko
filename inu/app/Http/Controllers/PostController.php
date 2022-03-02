<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tweet;
use Storage;

class PostController extends Controller
{

    public function index(){
      $tweets = tweet::all();
      return view('index', ['tweets'=>$tweets]);
    }

    public function postTweet(Request $request) //Requestはpostリクエストを取得するためのもの
    {
            $tweet = new tweet;
            $form = $request->all();

            $image_path = new tweet();
            $uploadImg = $image_path->image_path = $request->file('image_path');

            
            #$tweet = $request->file('tweet');
            $path = Storage::disk('s3')->putFile('/test', $tweet, 'public');

            $tweet->image_path = Storage::disk('s3')->url($path);

            #$tweet->save();
            

       # tweet::create([
        #    'user_id' => Auth::user()->id,
          #  'tweet' => $request->tweet,
           # 'image_path' => $path,
       # ]);
        
        return redirect('/timeline');
    }

}
