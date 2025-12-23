<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBuiltInFunctionRequest;
use App\Http\Requests\UpdateBuiltInFunctionRequest;
use App\Models\BuiltInFunction;
use App\Models\Technology;

class BuiltInFunctionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Technology $technology)
    {
        return view('docs.technology.builtinfunction.create', compact('technology'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBuiltInFunctionRequest $request)
    {
        $validated = $request->validated();
        $technology  = Technology::where('id', $validated['technology_id'])->firstOrFail(['name']);
        BuiltInFunction::create($validated);
        return redirect()
            ->route('technology.show', $technology->name)
            ->with('success-store-builtinFunction', 'Built-in function created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BuiltInFunction $builtInFunction)
    {
        return view('docs.technology.builtinfunction.show', compact('builtInFunction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BuiltInFunction $builtInFunction)
    {
        return view('docs.technology.builtinfunction.edit', compact('builtInFunction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBuiltInFunctionRequest $request, BuiltInFunction $builtInFunction)
    {
        $technology  = Technology::where('id', $builtInFunction->technology_id)->firstOrFail(['name']);
        $validated = $request->validated();
        $builtInFunction->update($validated);
        return redirect()
            ->route('technology.show', $technology->name)
            ->with('success-update-builtinFunction', 'Built-in function updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BuiltInFunction $builtInFunction)
    {
        $technology  = Technology::where('id', $builtInFunction->technology_id)->firstOrFail(['name']);
        $builtInFunction->delete();
        return redirect()
            ->route('technology.show', $technology->name)
            ->with('success-delete-builtinFunction', 'Built-in function deleted successfully.');
    }
}
