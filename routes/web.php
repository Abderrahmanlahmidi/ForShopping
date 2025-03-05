<?php

use App\Http\Controllers\ProduitController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategorieController;

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

//--Home
Route::get('/', [ProduitController::class, 'homepage']);

//--Categories
Route::get('/dashboard/categories', [CategorieController::class, 'index']);
Route::post('/dashboard/categories', [CategorieController::class, 'store']);
Route::delete('/dashboard/categories/{categorie}', [CategorieController::class, 'destroy']);

//--Produits
Route::get('/dashboard/produits', [ProduitController::class, 'index']);
Route::post('/dashboard/produits', [ProduitController::class, 'store']);
Route::delete('/dashboard/produits/delete/{produit}', [ProduitController::class, 'destroy']);
Route::get('/dashboard/produits/edit/{produit}', [ProduitController::class, 'edit']);
Route::put('/dashboard/produits/update/{produit}', [ProduitController::class, 'update']);

Route::post('/produits/{produit}', [ProduitController::class, 'products']);
Route::get('/panier', [ProduitController::class, 'displayProductsPanier']);
Route::get('/produit/{details}', [ProduitController::class, 'detailsProduct']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

