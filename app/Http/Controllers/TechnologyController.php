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
        return view('docs.technology.technology-index', ['technologies' => $technologies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('docs.technology.technology-create');
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
    public function show(Technology $technology)
    {
        $technology->load([
            'sections' => function ($query) {
                $query->select('id', 'title', 'technology_id');
            },
            'builtInFunctions' => function ($query) {
                $query->select('id', 'name',  'technology_id');
            },
        ]);
        return view('docs.technology.technology-show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        return view('docs.technology.technology-edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {
      $validated = $request->validated();
      $technology->update($validated);
        return redirect()
            ->route('technology.show', $technology->id)
            ->with('success-update-technology', 'technology updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
          

        $technology->delete();

        return redirect()->route('technology.index')->with('success-delete-technology', 'Technology deleted successfully!');
    }
}
