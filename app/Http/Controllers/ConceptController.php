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
     * Show the form for creating a new concept for a specific section.
     */
    public function create(Section $section): View
    {
        $title = 'إضافة مفهوم جديد';

        return view('docs.technology.section.concept.concept-create', compact('section', 'title'));
    }

    /**
     * Store a newly created concept in storage.
     */
    public function store(StoreConceptRequest $request, Section $section): RedirectResponse
    {

        $section->concepts()->create($request->validated());

        return to_route('section.show', $section)
            ->with('success-store-concept', 'Concept created successfully.');
    }

    /**
     * Display the specified concept with its parent section.
     */
    public function show(Concept $concept): View
    {
        $title = $concept->title;
        $concept->load([
            'section:id,title,slug,technology_id',
            'section.technology:id,name,slug',
        ]);

        return view('docs.technology.section.concept.concept-show', compact('title','concept'));
    }

    /**
     * Show the form for editing the specified concept.
     */
    public function edit(Concept $concept): View
    {
        $title = 'تعديل المفهوم';

        return view('docs.technology.section.concept.concept-edit', compact('concept', 'title'));
    }

    /**
     * Update the specified concept in storage.
     */
    public function update(UpdateConceptRequest $request, Concept $concept): RedirectResponse
    {
        $validated = $request->validated();
        $section = $concept->section;

        $concept->update($validated);

        return to_route('section.show', $section)
            ->with('success-update-concept', 'Concept updated successfully.');
    }

    /**
     * Remove the specified concept from storage.
     */
    public function destroy(Concept $concept): RedirectResponse
    {
        $section = $concept->section;

        $concept->delete();

        return to_route('section.show', $section)
            ->with('success-delete-concept', 'Concept deleted successfully.');
    }
}
