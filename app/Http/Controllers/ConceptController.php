<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConceptRequest;
use App\Http\Requests\UpdateConceptRequest;
use App\Models\Concept;
use App\Models\Section;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class ConceptController extends Controller
{
    /**
     * Display a listing of the concepts.
     *
     * @return View
     */
    public function index(): View
    {
        $concepts = Cache::remember('concepts.all', 3600, function () {
            return Concept::select('id', 'title', 'section_id')
                ->with('section:id,title,technology_id')
                ->latest()
                ->get();
        });

        return view('docs.technology.section.concept.concept-index', compact('concepts'));
    }

    /**
     * Show the form for creating a new concept for a specific section.
     *
     * @param Section $section
     * @return View
     */
    public function create(Section $section): View
    {
        return view('docs.technology.section.concept.concept-create', compact('section'));
    }

    /**
     * Store a newly created concept in storage.
     *
     * @param StoreConceptRequest $request
     * @return RedirectResponse
     */
    public function store(StoreConceptRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        Concept::create($validated);

        return redirect()
            ->route('section.show', $validated['section_id'])
            ->with('success-store-concept', 'Concept created successfully.');
    }

    /**
     * Display the specified concept with its parent section.
     *
     * @param Concept $concept
     * @return View
     */
    public function show(Concept $concept): View
    {
        // Cache the individual concept view along with its parent section and technology
        $conceptData = Cache::remember("concepts.show.{$concept->id}", 3600, function () use ($concept) {
            return $concept->load([
                'section:id,title,technology_id',
                'section.technology:id,name',
            ]);
        });

        return view('docs.technology.section.concept.concept-show', ['concept' => $conceptData]);
    }

    /**
     * Show the form for editing the specified concept.
     *
     * @param Concept $concept
     * @return View
     */
    public function edit(Concept $concept): View
    {
        return view('docs.technology.section.concept.concept-edit', compact('concept'));
    }

    /**
     * Update the specified concept in storage.
     *
     * @param UpdateConceptRequest $request
     * @param Concept $concept
     * @return RedirectResponse
     */
    public function update(UpdateConceptRequest $request, Concept $concept): RedirectResponse
    {
        $validated = $request->validated();
        $concept->update($validated);

        return redirect()
            ->route('section.show', $concept->section_id)
            ->with('success-update-concept', 'Concept updated successfully.');
    }

    /**
     * Remove the specified concept from storage.
     *
     * @param Concept $concept
     * @return RedirectResponse
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
