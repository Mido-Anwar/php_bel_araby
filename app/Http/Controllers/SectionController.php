<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSectionRequest;
use App\Models\Section;
use App\Models\Technology;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the sections.
     *
     * @return View
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new section for a specific technology.
     *
     * @param Technology $technology
     * @return View
     */

    public function create(Technology $technology)
    {
        return view('docs.technology.section.section-create', compact('technology'));
    }
    /**
     * Store a newly created section in storage.
     *
     * @param StoreSectionRequest $request
     * @return RedirectResponse
     */
    public function store(StoreSectionRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        Section::create($validated);

        return redirect()
            ->route('technology.show', $validated['technology_id'])
            ->with('success-store-section', 'Section created successfully.');
    }

    /**
     * Display the specified section with its related concepts.
     *
     * @param Section $section
     * @return View
     */
    public function show(Section $section): View
    {
        $section->load([
            'technology:id,name',
            'concepts:id,title,slug,type,section_id',
        ]);

        return view('docs.technology.section.section-show', ['section' => $section]);
    }

    /**
     * Show the form for editing the specified section.
     *
     * @param Section $section
     * @return View
     */
    public function edit(Section $section): View
    {
        return view('docs.technology.section.section-edit', compact('section'));
    }

    /**
     * Update the specified section in storage.
     *
     * @param UpdateSectionRequest $request
     * @param Section $section
     * @return RedirectResponse
     */
    public function update(UpdateSectionRequest $request, Section $section): RedirectResponse
    {
        $validated = $request->validated();
        $section->update($validated);

        return redirect()
            ->route('section.show', $section->id)
            ->with('success-update-section', 'Section updated successfully.');
    }

    /**
     * Remove the specified section from storage.
     *
     * @param Section $section
     * @return RedirectResponse
     */
    public function destroy(Section $section): RedirectResponse
    {
        $technologyId = $section->technology_id;
        $section->delete();

        return redirect()
            ->route('technology.show', $technologyId)
            ->with('success-delete-section', 'Section deleted successfully.');
    }
}
