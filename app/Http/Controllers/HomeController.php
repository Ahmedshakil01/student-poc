<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $content = Content::with('createdBy')->first();
        return view('student',compact('content'));
    }
}
