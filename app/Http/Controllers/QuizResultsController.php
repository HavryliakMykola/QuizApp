<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizResultsController extends Controller
{   
    public function index(){
        return view('');
    }
    public function show() {
        return view('result');
    }
}
