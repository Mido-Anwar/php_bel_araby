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
    public function show($name)
    {
        $technology = Technology::where('name', $name)
            ->with([
                'sections' => function ($query) {
                    $query->select('id', 'title', 'technology_id');
                },
                'sections.concepts:id,name,syntax,example,description',
                'builtinFunctions:id,name,syntax,example,description,technology_id',
            ])
            ->firstOrFail(['id', 'name', 'description']);
        return view('docs.main', ['technology' => $technology]);
    }
}
