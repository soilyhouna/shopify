<?php

use App\Mail\ProduitAjoute;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProduitController;

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


/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::resource("produits", ProduitController::class);

Route::get("ajouter_produit",[MainController::class,"ajouterProduit"]);

Route::get("ajouter_produit2",[MainController::class,"ajouterProduit2"]);

Route::get("update_produit",[MainController::class,"updateProduit"]);

Route::get("update_produit2",[MainController::class,"updateProduit2"]);

Route::get("suppression_produit",[MainController::class,"supprimerProduit"]);

Route::get("suppression_produit/{id}",[MainController::class,"supprimerProduit2"]);

Route::get("create_category",[MainController::class,"createCategory"]);

Route::get("get_produit/{produit}",[MainController::class,"getProduit"]);

Route::get("commande",[MainController::class,"commande"]);

Route::get("/",[MainController::class,"acceuil"])->name("acceuil");

Route::get("test_collection",[MainController::class,"collection"]);

Route::get("test-mail",function(){
    return new ProduitAjoute;
    });

//Route::get("test-notification",function(){
    //return new ModificationProduit;
    //});