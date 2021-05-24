<?php

use App\Http\Controllers\BilanController;
use App\Http\Controllers\InformationController;
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

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
#================PRODUCTEURS
    Route::get('/nouveau-producteur', [ProducteurController::class, 'nouveau_producteur'])->name('nouveau_producteur');
    Route::get('/liste-des-producteurs', [ProducteurController::class, 'liste_producteurs'])->name('liste_producteurs');
    Route::get('/editer-un-producteur/{id_producteur}', [ProducteurController::class, 'editer_producteur'])->name('editer_producteur');

    Route::post('/enregistrer-producteur', [ProducteurController::class, 'enregistrer_producteur'])->name('enregistrer_producteur');
    Route::post('/modifier-producteur/{id_producteur}', [ProducteurController::class, 'modifier_producteur'])->name('modifier_producteur');
    Route::delete('/supprimer-producteur/{id_producteur}', [ProducteurController::class, 'supprimer_producteur'])->name('supprimer_producteur');


#================//OPERATIONS
    Route::get('/nouvelle-operation', [OperationController::class, 'nouvelle_operation'])->name('nouvelle_operation');
    Route::get('/liste-des-operations/{etat_operation?}', [OperationController::class, 'liste_operations'])->name('liste_operations');
    Route::get('/editer-une-operations/{id_operation}', [OperationController::class, 'editer_operation'])->name('editer_operation');
    Route::get('/operation-producteur/{id_operation}', [OperationController::class, 'operation_producteur'])->name('operation_producteur');

    Route::post('/enregistrer-operation', [OperationController::class, 'enregistrer_operation'])->name('enregistrer_operation');
    Route::post('/modifier-operation/{id_operation}', [OperationController::class, 'modifier_operation'])->name('modifier_operation');
    Route::delete('/supprimer-operation/{id_operation}', [OperationController::class, 'supprimer_operation'])->name('supprimer_operation');

#==============//INFORMATIONS

    Route::get('/nouvelle-informations', [InformationController::class, 'nouvelle_information'])->name('nouvelle_information');
    Route::get('/liste-informations', [InformationController::class, 'liste_informations'])->name('liste_informations');

    Route::post('/enregistrer-informations', [InformationController::class, 'enregistrer_information'])->name('enregistrer_information');
    Route::delete('/supprimer-informations/{id_information}', [InformationController::class, 'supprimer_information'])->name('supprimer_information');

#==============//bilan_periodique
    Route::get('/choisir-configuration-bilan', [BilanController::class, 'choisir_configuration_bilan'])->name('choisir_configuration_bilan');
    Route::post('/bilan-periodique', [BilanController::class, 'bilan_periodique'])->name('bilan_periodique');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $nb_operation_en_attente = sizeof(\App\Models\Operation::where('statut','=','en_attente')->get());
    $nb_livraison_en_cours = sizeof(\App\Models\Operation::where('statut','=','livraison_en_cours')->get());
    $nb_livraison_effectuer = sizeof(\App\Models\Operation::where('statut','=','livraison_effectuer')->get());
    $nb_maluces = sizeof(\App\Models\Operation::where('maluces','=','oui')->get());
    $nb_paiement_disponible = sizeof(\App\Models\Operation::where('statut','=','paiement_disponible')->get());
    $nb_paiement_effectuer = sizeof(\App\Models\Operation::where('statut','=','paiement_effectuer')->get());
    return view('dashboard',compact('nb_operation_en_attente','nb_livraison_en_cours','nb_livraison_effectuer','nb_maluces','nb_paiement_disponible','nb_paiement_effectuer'));
})->name('dashboard');
