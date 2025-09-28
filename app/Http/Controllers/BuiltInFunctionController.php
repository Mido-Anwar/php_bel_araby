<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBuiltInFunctionRequest;
use App\Http\Requests\UpdateBuiltInFunctionRequest;
use App\Models\BuiltInFunction;

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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBuiltInFunctionRequest $request)
    {
        $validated = $request->validated();
        BuiltInFunction::create($validated);
        return redirect()
            ->route('section.show', $validated['section_id'])
            ->with('success_builtin', 'Built-in function created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BuiltInFunction $builtInFunction) {
        return view('learning_and_references.section.builtinfuncShow', compact('concept'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BuiltInFunction $builtInFunction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBuiltInFunctionRequest $request, BuiltInFunction $builtInFunction)
    {
        $validated = $request->validated();
        $builtInFunction->update($validated);
        return redirect()
            ->route('section.show', $builtInFunction->section_id)
            ->with('update-success_builtin', 'Built-in function updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BuiltInFunction $builtInFunction)
    {
        $builtInFunction->delete();
        return redirect()
            ->route('section.show', $builtInFunction->section_id)
            ->with('delete-success_builtin', 'Built-in function deleted successfully.');
    }
}
