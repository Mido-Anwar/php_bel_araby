<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSectionRequest;
use App\Models\Section;
use App\Models\Technology;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSectionRequest $request)
    {
        $validated = $request->validated();
        $technology  = Technology::where('id', $validated['technology_id'])->firstOrFail(['name']);

        Section::create($request->validated());
        return redirect()
            ->route('technology.show', $technology->name)
            ->with('success-store-section', 'Section created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        return view('learning_and_references.section.show', compact('section'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        return view('learning_and_references.section.edit', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSectionRequest $request, Section $section)
    {

        $section->update($request->validated());
        return redirect()
            ->route('section.show', $section->id)
            ->with('success-update-section', 'Section updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        $technology  = Technology::where('id', $section->technology_id)->firstOrFail(['name']);
        $section->delete();
        return redirect()
            ->route('technology.show', $technology->name)
            ->with('success-delete-section', 'Section deleted successfully.');
    }
}
