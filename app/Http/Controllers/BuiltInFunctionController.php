<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBuiltInFunctionRequest;
use App\Http\Requests\UpdateBuiltInFunctionRequest;
use App\Models\BuiltInFunction;
use App\Models\Technology;

class BuiltInFunctionController extends Controller
{
    /**
     * Display a listing of the built-in functions.
     *
     * @return void
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new built-in function for a specific technology.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\View\View
     */
    public function create(Technology $technology)
    {
        return view('docs.technology.builtinfunction.create', compact('technology'));
    }

    /**
     * Store a newly created built-in function in storage.
     *
     * @param  \App\Http\Requests\StoreBuiltInFunctionRequest  $request
     * @return \Illuminate\Http\RedirectResponse
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
     * Display the specified built-in function.
     *
     * @param  \App\Models\BuiltInFunction  $builtInFunction
     * @return \Illuminate\View\View
     */
    public function show(BuiltInFunction $builtInFunction)
    {
        return view('docs.technology.builtinfunction.show', compact('builtInFunction'));
    }

    /**
     * Show the form for editing the specified built-in function.
     *
     * @param  \App\Models\BuiltInFunction  $builtInFunction
     * @return \Illuminate\View\View
     */
    public function edit(BuiltInFunction $builtInFunction)
    {
        return view('docs.technology.builtinfunction.edit', compact('builtInFunction'));
    }

    /**
     * Update the specified built-in function in storage.
     *
     * @param  \App\Http\Requests\UpdateBuiltInFunctionRequest  $request
     * @param  \App\Models\BuiltInFunction  $builtInFunction
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateBuiltInFunctionRequest $request, BuiltInFunction $builtInFunction)
    {
        $validated = $request->validated();
        $builtInFunction->update($validated);
        return redirect()
            ->route('builtinfunction.show', $builtInFunction->id)
            ->with('success-update-builtinFunction', 'Built-in function updated successfully.');
    }

    /**
     * Remove the specified built-in function from storage.
     *
     * @param  \App\Models\BuiltInFunction  $builtInFunction
     * @return \Illuminate\Http\RedirectResponse
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
