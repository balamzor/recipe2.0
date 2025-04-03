<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use Illuminate\Http\Request;
use App\Models\Ingredient;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/ingredients', function () {
    $ingredients = DB::select('SELECT * FROM ingredients');
    return response()->json($ingredients);
});
Route::get('/ing', function() {
    return view('ingredients');
});
Route::post('/ingredients', function (Request $request) {
    $request->validate([
        'name' => 'required|string|max:255|unique:ingredients',
        'icon' => 'required|string|max:255|unique:ingredients',
    ]);

    $ingredient = new Ingredient();
    $ingredient->name = $request->name;
    $ingredient->icon = $request->icon;
    $ingredient->save();
    return response()->json([
        'message' => 'Ingredient ajout ',
        'ingredient' => $ingredient
    ], 201);
});
Route::get('/addingredients', function () {
    return view('addingredients');
});
// Route::get('/addrecipe', function () {
//     return view('recipes.index');
// });
Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes.index');
Route::post('/recipes', [RecipeController::class, 'store'])->name('recipes.store');



// Route::get('/addrecipe', 'RecipeController@index')->name('recipes.index');