<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTechnologyRequest;
use App\Http\Requests\UpdateTechnologyRequest;
use App\Models\Technology;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $techs = Technology::select('id', 'name')->get();
        return view('learning_and_references.Technology.index', ['techs' => $techs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('learning_and_references.Technology.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTechnologyRequest $request)
    {

        Technology::create($request->validated());
        return redirect()
            ->route('tech.index')
            ->with('success', 'Technology created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($name)
    {
        $technology = Technology::where('name', $name)->firstOrFail();
        return view('learning_and_references.Technology.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        return view('learning_and_references.Technology.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        //
    }
}
