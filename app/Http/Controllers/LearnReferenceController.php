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
    //     return view('learning_and_references.main');
    // }
    public function show($name)
    {
      $technology = Technology::where('name', $name)
    ->with([
        'sections' => function ($query) {
            $query->select('id', 'title', 'technology_id');
        },
        'sections.concepts:id,section_id,name',
        'sections.builtinFunctions:id,section_id,name',
    ])
    ->firstOrFail(['id', 'name','description']);
        return view('learning_and_references.main', ['technology' => $technology]);
    }
}
