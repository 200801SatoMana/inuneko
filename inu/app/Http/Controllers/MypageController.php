<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{

    public function update(Request $request){
        
            if($request->hasFile('icon')) {
                $id = Auth::id();
                $photo_path = $request->file('icon')->store('public/top_file');
                $icon_pass2 = basename($photo_path);
                // DB更新
                $affected = DB::table('users')
                    ->where('id', $id)
                    ->update(['icon' => $icon_pass2]);
                // 画像表示
                return redirect("/mypage")->with([
                    "message" => "アイコンを変更しました。",
                    "icon_pass" => $icon_pass2 
                ]);
            }
    }

    public function index()
    {
        $id = Auth::id();
        $user = DB::table('users')->find($id);
        return view('mypage',['myuser'=>$user]);
    }

    public function userpage($uid)
    {
        $user = DB::table('users')->find($uid);
        return view('userpage',['myuser'=>$user]);
    }
}
