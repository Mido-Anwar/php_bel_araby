<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSectionRequest;
use App\Models\Section;
use App\Models\Technology;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SectionController extends Controller
{
    /**
     * Show the form for creating a new section for a specific technology.
     */
    public function create(Technology $technology): View
    {
        $title = 'إضافة قسم جديد';

        return view('docs.technology.section.section-create', compact('technology', 'title'));
    }

    /**
     * Store a newly created section in storage.
     */
    public function store(StoreSectionRequest $request, Technology $technology): RedirectResponse
    {
        $technology->sections()->create($request->validated());

        return to_route('technology.show', $technology)
            ->with('success-store-section', 'Section created successfully.');
    }

    /**
     * Display the specified section with its related concepts.
     */
    public function show(Section $section): View
    {
        $title = $section->title;
        $section->load([
            'technology:id,name,slug',
            'concepts:id,section_id,title,slug,type,description',
        ]);

        return view('docs.technology.section.section-show', compact('title', 'section'));
    }

    /**
     * Show the form for editing the specified section.
     */
    public function edit(Section $section): View
    {
        $title = 'تعديل القسم';

        return view('docs.technology.section.section-edit', compact('section', 'title'));
    }

    /**
     * Update the specified section in storage.
     */
    public function update(UpdateSectionRequest $request, Section $section): RedirectResponse
    {
        $validated = $request->validated();

        $section->update($validated);

        return
            to_route('section.show', $section)
            ->with('success-update-section', 'Section updated successfully.');
    }

    /**
     * Remove the specified section from storage.
     */
    public function destroy(Section $section)
    {
        $technology = $section->technology;
        $section->delete();
        return to_route('technology.show', $technology)
            ->with('success-deleted-section', 'Section deleted successfully.');
    }
}
