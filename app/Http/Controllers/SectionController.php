<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSectionRequest;
use App\Models\Section;
use App\Models\Technology;

class SectionController extends Controller
{
    /**
     * Display a listing of the sections.
     *
     * @return void
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new section.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created section in storage.
     *
     * @param  \App\Http\Requests\StoreSectionRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreSectionRequest $request)
    {
        $validated = $request->validated();
        Section::create($request->validated());
        return redirect()
            ->route('technology.show', $validated['technology_id'])
            ->with('success-store-section', 'Section created successfully.');
    }

    /**
     * Display the specified section.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\View\View
     */
    public function show(Section $section)
    {
        return view('docs.technology.section.section-show', compact('section'));
    }

    /**
     * Show the form for editing the specified section.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\View\View
     */
    public function edit(Section $section)
    {
        return view('docs.technology.section.section-edit', compact('section'));
    }

    /**
     * Update the specified section in storage.
     *
     * @param  \App\Http\Requests\UpdateSectionRequest  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateSectionRequest $request, Section $section)
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
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Section $section)
    {
        $section->delete();
        return redirect()
            ->route('technology.show', $section->technology_id)
            ->with('success-delete-section', 'Section deleted successfully.');
    }
}
