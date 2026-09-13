<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBuiltInFunctionRequest;
use App\Http\Requests\UpdateBuiltInFunctionRequest;
use App\Models\BuiltInFunction;
use App\Models\Technology;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class BuiltInFunctionController extends Controller
{
    /**
     * Display a listing of the built-in functions.
     *
     * @return View
     */
    public function index(): View
    {
        $builtInFunctions = Cache::remember('built_in_functions.all', 3600, function () {
            return BuiltInFunction::select('id', 'title', 'tag_name', 'technology_id')
                ->with('technology:id,name')
                ->latest()
                ->get();
        });

        return view('docs.technology.builtinfunction.index', compact('builtInFunctions'));
    }

    /**
     * Show the form for creating a new built-in function for a specific technology.
     *
     * @param Technology $technology
     * @return View
     */
    public function create(Technology $technology): View
    {
        return view('docs.technology.builtinfunction.create', compact('technology'));
    }

    /**
     * Store a newly created built-in function in storage.
     *
     * @param StoreBuiltInFunctionRequest $request
     * @return RedirectResponse
     */
    public function store(StoreBuiltInFunctionRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        BuiltInFunction::create($validated);

        return redirect()
            ->route('technology.show', $validated['technology_id'])
            ->with('success-store-builtinFunction', 'Built-in function created successfully.');
    }

    /**
     * Display the specified built-in function.
     *
     * @param BuiltInFunction $builtInFunction
     * @return View
     */
    public function show(BuiltInFunction $builtInFunction): View
    {
        // Cache the individual function view with its parent technology
        $functionData = Cache::remember("built_in_functions.show.{$builtInFunction->id}", 3600, function () use ($builtInFunction) {
            return $builtInFunction->load('technology:id,name');
        });

        return view('docs.technology.builtinfunction.show', ['builtInFunction' => $functionData]);
    }

    /**
     * Show the form for editing the specified built-in function.
     *
     * @param BuiltInFunction $builtInFunction
     * @return View
     */
    public function edit(BuiltInFunction $builtInFunction): View
    {
        return view('docs.technology.builtinfunction.edit', compact('builtInFunction'));
    }

    /**
     * Update the specified built-in function in storage.
     *
     * @param UpdateBuiltInFunctionRequest $request
     * @param BuiltInFunction $builtInFunction
     * @return RedirectResponse
     */
    public function update(UpdateBuiltInFunctionRequest $request, BuiltInFunction $builtInFunction): RedirectResponse
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
     * @param BuiltInFunction $builtInFunction
     * @return RedirectResponse
     */
    public function destroy(BuiltInFunction $builtInFunction): RedirectResponse
    {
        $technologyId = $builtInFunction->technology_id;
        $builtInFunction->delete();

        return redirect()
            ->route('technology.show', $technologyId)
            ->with('success-delete-builtinFunction', 'Built-in function deleted successfully.');
    }
}
