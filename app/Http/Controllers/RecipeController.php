<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Ingredient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        $ingredients = Ingredient::all(); // Assuming you have an Ingredient model
        return view('recipes.index', compact('ingredients'));
    }
    

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'steps' => 'required|array',
            'ingredients' => 'required|array',
        ]);
    
        $recipe = new Recipe();
        $recipe->title = $validatedData['title'];
        $recipe->description = $validatedData['description'];
        $recipe->steps = json_encode($validatedData['steps']);
        $recipe->ingredients = json_encode($validatedData['ingredients']);
    
        $recipe->save();
    
        return redirect()->route('recipes.index')->with('success', 'Recette ajoutée avec succès!');
    }
}