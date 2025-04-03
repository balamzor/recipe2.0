<?php

use Illuminate\Support\Facades\Route;

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
