<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTechnologyRequest;
use App\Http\Requests\UpdateTechnologyRequest;
use App\Models\Technology;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the technologies.
     */
    public function index(): View
    {
        $title = 'التقنيات المتاحة';
        $technologies = Technology::select('id', 'name', 'slug')
            ->latest()
            ->get();

        return view('docs.technology.technology-index', compact('technologies', 'title'));
    }

    /**
     * Show the form for creating a new technology.
     */
    public function create(): View
    {
        return view('docs.technology.technology-create');
    }

    /**
     * Store a newly created technology in storage.
     */
    public function store(StoreTechnologyRequest $request): RedirectResponse
    {
        Technology::create($request->validated());

        return redirect()
            ->route('technology.index')
            ->with('success-store-technology', 'Technology created successfully.');
    }

    /**
     * Display the specified technology with its sections.
     */
    public function show(Technology $technology): View
    {
        $title = 'تعديل التقنية و اضافة اقسام';
        $technology->load([
            'sections:id,title,technology_id',
            'sections.concepts:id,title,slug,type,section_id',
        ]);

        return view('docs.technology.technology-show', ['technology' => $technology, 'title' => $title]);
    }

    /**
     * Show the form for editing the specified technology.
     */
    public function edit(Technology $technology): View
    {
        return view('docs.technology.technology-edit', compact('technology'));
    }

    /**
     * Update the specified technology in storage.
     */
    public function update(UpdateTechnologyRequest $request, Technology $technology): RedirectResponse
    {
        $validated = $request->validated();
        $technology->update($validated);

        return redirect()
            ->route('technology.show', $technology->id)
            ->with('success-update-technology', 'Technology updated successfully.');
    }

    /**
     * Remove the specified technology from storage.
     */
    public function destroy(Technology $technology): RedirectResponse
    {
        $technology->delete();

        return redirect()
            ->route('technology.index')
            ->with('success-delete-technology', 'Technology deleted successfully!');
    }
}
