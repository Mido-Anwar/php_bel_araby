<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LearnReferenceController extends Controller
{
    public function index(){

        return view('learning_and_references.main');
    }
}
