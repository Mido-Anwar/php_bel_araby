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
        $technologies = Technology::select('id', 'name')->get();
        return view('learning_and_references.technology.index', ['technologies' => $technologies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('learning_and_references.technology.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTechnologyRequest $request)
    {

        Technology::create($request->validated());
        return redirect()
            ->route('technology.index')
            ->with('success-store-technology', 'Technology created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($name)
    {
        // $tech = Technology::where('name', $name)->firstOrFail();
        $technology = Technology::where('name', $name)
            ->with([
                'sections' => function ($query) {
                    $query->select('id', 'title', 'technology_id');
                },
            ])->firstOrFail(['id', 'name', 'description']);

        return view('learning_and_references.technology.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($name)
    {
        $technology = Technology::where('name', $name)->firstOrFail();

        return view('learning_and_references.technology.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTechnologyRequest $request, $name)
    {
        $tech = Technology::where('name', $name)->firstOrFail();
        $tech->update($request->validated());
        return redirect()
            ->route('technology.index')
            ->with('success-update-technology', 'technology updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($name)
    {
        $tech = Technology::where('name', $name)->firstOrFail();

        $tech->delete();

        return redirect()->route('technology.index')->with('success-delete-technology', 'Technology deleted successfully!');
    }
}
