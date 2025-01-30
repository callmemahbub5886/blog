<?php

namespace App\Http\Controllers\ui;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Uicontroller extends Controller
{
    public function personal(){
        return view('personal');
    }
    public function personals(){
        return view('personal-alt');
    }
    public function minimal(){
        return view('minimal');
    }
    public function classic(){
        return view('classic');
    }
    public function category(){
        return view('category');
    }
    public function blog(){
        return view('blog-single');
    }
    public function blogs(){
        return view('blog-single-alt');
    }
    public function about(){
        return view('about');
    }
    public function contract(){
        return view('contact');
    }
}
