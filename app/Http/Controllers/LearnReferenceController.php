<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use Illuminate\Http\Request;

class LearnReferenceController extends Controller
{
    public function index()
    {
        $techs = Technology::select("id", "name")
            ->with(['sections.concepts', 'sections.builtinFunctions'])
            ->get();

        // $techs = Technology::with(['sections.concepts', 'sections.builtinFunctions'])->find(1);

        return view('learning_and_references.main', ['techs' => $techs]);
    }
}
