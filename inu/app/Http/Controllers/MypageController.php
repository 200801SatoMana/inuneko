<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{

    public function update(Request $request){
        
            if($request->hasFile('icon')) {
                $userID = Auth::userID();
                $photo_path = $request->file('icon')->store('public/top_file');
                $icon_pass2 = basename($photo_path);
                // DBの対象カラムを更新する
                $affected = DB::table('users')
                    ->where('userID', $userID)
                    ->update(['profile_path' => $icon_pass2]);
                // 画像に表示させる
                return redirect("/mypage")->with([
                    "message" => "アイコンを変更しました。",
                    "icon_pass" => $icon_pass2 
                ]);
            }
    }

    public function index()
    {
        $userID = Auth::id();
        $user = DB::table('users')->find($userID);
        return view('mypage',['myuser'=>$user]);
    }
}
