<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConceptRequest;
use App\Http\Requests\UpdateConceptRequest;
use App\Models\Concept;
use App\Models\Section;

class ConceptController extends Controller
{
    /**
     * Display a listing of the concepts.
     *
     * @return void
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new concept for a specific section.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\View\View
     */
    public function create(Section $section)
    {
        return view('docs.technology.section.concept.concept-create', compact('section'));
    }

    /**
     * Store a newly created concept in storage.
     *
     * @param  \App\Http\Requests\StoreConceptRequest  $request
     * @return \Illuminate\Http\RedirectResponse
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
     * Display the specified concept.
     *
     * @param  \App\Models\Concept  $concept
     * @return \Illuminate\View\View
     */
    public function show(Concept $concept)
    {
        return view('docs.technology.section.concept.concept-show', compact('concept'));
    }

    /**
     * Show the form for editing the specified concept.
     *
     * @param  \App\Models\Concept  $concept
     * @return \Illuminate\View\View
     */
    public function edit(Concept $concept)
    {
        return view('docs.technology.section.concept.concept-edit', compact('concept'));
    }

    /**
     * Update the specified concept in storage.
     *
     * @param  \App\Http\Requests\UpdateConceptRequest  $request
     * @param  \App\Models\Concept  $concept
     * @return \Illuminate\Http\RedirectResponse
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
     * Remove the specified concept from storage.
     *
     * @param  \App\Models\Concept  $concept
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Concept $concept)
    {
        $concept->delete();
        return redirect()
            ->route('section.show', $concept->section_id)
            ->with('success-delete-concept', 'Concept deleted successfully.');
    }
}
