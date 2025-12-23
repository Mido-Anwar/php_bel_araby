<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConceptRequest;
use App\Http\Requests\UpdateConceptRequest;
use App\Models\Concept;

class ConceptController extends Controller
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
        return view('docs.section.concept.concept-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConceptRequest $request)
    {
        $validated = $request->validated();

        Concept::create($validated);
        return redirect()
            ->route('section.show', $validated['section_id'])
            ->with('success-store-concept', 'Concept created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Concept $concept)
    {
        return view('docs.section.concept.concept-show', compact('concept'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Concept $concept)
    {
        return view('docs.section.concept.concept-edit', compact('concept'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConceptRequest $request, Concept $concept)
    {
        $validated = $request->validated();
        $concept->update($validated);
        return redirect()
            ->route('section.show', $validated['section_id'])
            ->with('success-update-concept', 'Concept updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Concept $concept)
    {
        $concept->delete();
        return redirect()
            ->route('section.show', $concept->section_id)
            ->with('success-delete-concept', 'Concept deleted successfully.');
    }
}
