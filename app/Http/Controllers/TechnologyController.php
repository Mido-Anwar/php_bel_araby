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
        $technologies = Cache::remember('technologies', 3600, function () {
            return Technology::select('id', 'name')->get();
        });
        return view('docs.technology.technology-index', ['technologies' => $technologies]);
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
        $technology->load([
            'sections' => function ($query) {
                $query->select('id', 'title', 'technology_id');
            },
            'builtInFunctions' => function ($query) {
                $query->select('id', 'title', 'technology_id');
            },
        ]);
        return view('docs.technology.technology-show', compact('technology'));
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
            ->with('success-update-technology', 'technology updated successfully.');
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

        return redirect()->route('technology.index')->with('success-delete-technology', 'Technology deleted successfully!');
    }
}
