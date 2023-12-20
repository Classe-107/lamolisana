<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return redirect('/products');
    //return redirect()->route('products.index');
    return view('home');
})->name('home');



Route::get('/products', function () {
    $products = config('db.products');
    return view('products.index', compact('products'));
})->name('products.index');

Route::get('/products/{id}', function ($id) {
    $products = config('db.products');
    //cercare prodotto con quell'id
    if ($id >= 0 && $id < count($products)) {
        $product = $products[$id];
        return view('products.show', compact('product'));
    } else {
        abort(404);
    }
})->name('products.show');


Route::get('/recipes', function () {
    $recipes = config('db.recipes');
    return view('recipes.index', compact('recipes'));
})->name('recipes.index');

Route::get('/recipes/{id}', function ($id) {
    $recipes = config('db.recipes');
    $recipe = Arr::first($recipes, function ($value, $key) use ($id) {
        return $value['idMeal'] == $id;
    });
    if ($recipe) {
        return view('recipes.show', compact('recipe'));
    } else {
        abort(404);
    }

})->name('recipes.show');

Route::get('/about', function () {
    return view('pages.about');
}
)->name('about');

Route::fallback(function () {
    return redirect()->route('home');
});
