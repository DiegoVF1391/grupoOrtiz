<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Product;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Ruta de inicio
Route::get('/', function () {
    return Inertia::render('Welcome');
});

// Rutas para la gestión de productos
Route::get('/products', function () {
    return Inertia::render('Products/Index', [
        'products' => Product::all()
    ]);
})->name('products.index');

Route::get('/products/create', function () {
    return Inertia::render('Products/Form');
})->name('products.create');

Route::get('/products/{id}/edit', function ($id) {
    $product = Product::findOrFail($id);
    return Inertia::render('Products/Form', [
        'product' => $product
    ]);
})->name('products.edit');

// Ruta para la consulta de Pokémon
Route::get('/pokemon', function () {
    return Inertia::render('Pokemon/Index');
})->name('pokemon.index');

// Añade las rutas para manejar las solicitudes POST, PUT, DELETE
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');