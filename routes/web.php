<?php

use App\Http\Controllers\OperationController;
use App\Http\Controllers\ProducteurController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () { return view('welcome'); });

#================PRODUCTEURS
Route::get('/nouveau-producteur',[ProducteurController::class,'nouveau_producteur'])->name('nouveau_producteur');
Route::get('/liste-des-producteurs',[ProducteurController::class,'liste_producteurs'])->name('liste_producteurs');
Route::get('/editer-un-producteur/{id_producteur}',[ProducteurController::class,'editer_producteur'])->name('editer_producteur');

Route::post('/enregistrer-producteur',[ProducteurController::class,'enregistrer_producteur'])->name('enregistrer_producteur');
Route::post('/modifier-producteur/{id_producteur}',[ProducteurController::class,'modifier_producteur'])->name('modifier_producteur');
Route::delete('/supprimer-producteur/{id_producteur}',[ProducteurController::class,'supprimer_producteur'])->name('supprimer_producteur');


#================//OPERATIONS
Route::get('/nouvelle-operation',[OperationController::class,'nouvelle_operation'])->name('nouvelle_operation');
Route::get('/liste-des-operations',[OperationController::class,'liste_operations'])->name('liste_operations');
Route::get('/editer-une-operations/{id_operation}',[OperationController::class,'editer_operation'])->name('editer_operation');

Route::post('/enregistrer-operation',[OperationController::class,'enregistrer_operation'])->name('enregistrer_operation');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
