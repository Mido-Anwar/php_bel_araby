<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTechnologyRequest;
use App\Http\Requests\UpdateTechnologyRequest;
use App\Models\Technology;
use Illuminate\Support\Facades\Cache;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the technologies.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $technologies = Cache::remember('technologies.all', 3600, function () {
            return Technology::select('id', 'name')
                ->latest()
                ->get();
        });

        return view('docs.technology.technology-index', compact('technologies'));
    }

    /**
     * Show the form for creating a new technology.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('docs.technology.technology-create');
    }

    /**
     * Store a newly created technology in storage.
     *
     * @param  \App\Http\Requests\StoreTechnologyRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreTechnologyRequest $request)
    {
        Technology::create($request->validated());

        return redirect()
            ->route('technology.index')
            ->with('success-store-technology', 'Technology created successfully.');
    }

    /**
     * Display the specified technology with its sections and built-in functions.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\View\View
     */
    public function show(Technology $technology)
    {
        // Cache the specific technology with its relations
        $technologyData = Cache::remember("technologies.show.{$technology->id}", 3600, function () use ($technology) {
            return $technology->load([
                'sections:id,title,technology_id',
                'builtinFunctions:id,title,technology_id',
            ]);
        });

        return view('docs.technology.technology-show', ['technology' => $technologyData]);
    }

    /**
     * Show the form for editing the specified technology.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\View\View
     */
    public function edit(Technology $technology)
    {
        return view('docs.technology.technology-edit', compact('technology'));
    }

    /**
     * Update the specified technology in storage.
     *
     * @param  \App\Http\Requests\UpdateTechnologyRequest  $request
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {
        $validated = $request->validated();
        $technology->update($validated);

        return redirect()
            ->route('technology.show', $technology->id)
            ->with('success-update-technology', 'Technology updated successfully.');
    }

    /**
     * Remove the specified technology from storage.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();

        return redirect()
            ->route('technology.index')
            ->with('success-delete-technology', 'Technology deleted successfully!');
    }
}
