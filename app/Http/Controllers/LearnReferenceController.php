<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use Illuminate\Http\Request;

class LearnReferenceController extends Controller
{
    // public function index()
    // {
    //    // $technologies = Technology::select("id", "name")->get();
    //     // $technologies = Technology::with(['sections.concepts', 'sections.builtinFunctions'])->find(1);
    //     return view('docs.main');
    // }
    /**
     * Show of main page review the technology.
     *
     * @param  string  $name
     * @return \Illuminate\View\View
     */
    public function show($name)
    {
        $technology = Technology::where('name', $name)->firstOrFail(['id', 'name', 'description']);
        return view('docs.main', ['technology' => $technology]);
    }
}
