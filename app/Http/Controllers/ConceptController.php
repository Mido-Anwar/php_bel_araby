<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConceptRequest;
use App\Http\Requests\UpdateConceptRequest;
use App\Models\Concept;
use App\Models\Section;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ConceptController extends Controller
{
    /**
     * Display a listing of the concepts.
     */
    public function index(): View
    {
        $concepts = Concept::select('id', 'title', 'slug', 'type', 'section_id')
            ->with('section:id,title,technology_id', 'section.technology:id,name')
            ->latest()
            ->get();

        return view('docs.technology.section.concept.concept-index', compact('concepts'));
    }

    /**
     * Show the form for creating a new concept for a specific section.
     */
    public function create(Section $section): View
    {
        return view('docs.technology.section.concept.concept-create', compact('section'));
    }

    /**
     * Store a newly created concept in storage.
     */
    public function store(StoreConceptRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if (($validated['type'] ?? 'concept') === 'concept') {
            $validated['syntax'] = null;
            $validated['return_type'] = null;
        }

        Concept::create($validated);

        return redirect()
            ->route('section.show', $validated['section_id'])
            ->with('success-store-concept', 'Concept created successfully.');
    }

    /**
     * Display the specified concept with its parent section.
     */
    public function show(Concept $concept): View
    {
        $concept->load([
            'section:id,title,technology_id',
            'section.technology:id,name',
        ]);

        return view('docs.technology.section.concept.concept-show', ['concept' => $concept]);
    }

    /**
     * Show the form for editing the specified concept.
     */
    public function edit(Concept $concept): View
    {
        return view('docs.technology.section.concept.concept-edit', compact('concept'));
    }

    /**
     * Update the specified concept in storage.
     */
    public function update(UpdateConceptRequest $request, Concept $concept): RedirectResponse
    {
        $validated = $request->validated();

        if (($validated['type'] ?? 'concept') === 'concept') {
            $validated['syntax'] = null;
            $validated['return_type'] = null;
        }

        $concept->update($validated);

        return redirect()
            ->route('section.show', $concept->section_id)
            ->with('success-update-concept', 'Concept updated successfully.');
    }

    /**
     * Remove the specified concept from storage.
     */
    public function destroy(Concept $concept): RedirectResponse
    {
        $sectionId = $concept->section_id;
        $concept->delete();

        return redirect()
            ->route('section.show', $sectionId)
            ->with('success-delete-concept', 'Concept deleted successfully.');
    }
}
