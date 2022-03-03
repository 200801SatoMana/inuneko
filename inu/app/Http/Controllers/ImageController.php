<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Storage;

class ImageController extends Controller
{
   
    public function index()
    {
        $images = Image::latest()->get();#新着順
        return view('index',compact('images')); # ['images'=>$images]);
    }

    
    public function store(Request $request)
    {
        $image=new Image();
        $uploadImg = $image->image = $request->file('image');
        $path = Storage::disk('s3')->putFile('/test',$uploadImg,'public');
        $image->image = Storage::disk('s3')->url($path);
        $image->save();
        return redirect('/timeline');
    }

   

    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }
}
