<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 
use \App\Models\tweet; // 


class TimelineController extends Controller
{
    public function showTimelinePage()
    {
        
                
        $tweets = tweet::latest()->get();  // 
        #$file = tweet::latest()->get();
        
        return view('auth.timeline',compact('tweets'));   // 
    }

    
    }

