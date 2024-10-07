<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;
use Inertia\Response;

use function Termwind\render;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('Ingredients/Index', [
            'ingredients' => Ingredient::with('user:id,name')
                ->orderBy('name')
                ->paginate(3),
        ]);
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
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $request->user()->ingredients()->create($validated);

        return redirect()->route('ingredients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ingredient $ingredient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ingredient $ingredient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ingredient $ingredient): RedirectResponse
    {
        Gate::authorize('update', $ingredient);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $ingredient->update($validated);

        // Capture the current page number from the request
        $currentPage = $request->input('page', 1);

        return redirect()->route('ingredients.index', ['page' => $currentPage]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ingredient $ingredient): RedirectResponse
    {
        Gate::authorize('delete', $ingredient);

        $ingredient->delete();

        return redirect(route('ingredients.index'));
    }
}
