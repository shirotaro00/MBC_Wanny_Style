<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[ClientController::class, 'accueil'])->name('page.accueil');
Route::get('/article',[ClientController::class, 'article'])->name('page.article');
Route::get('/details/{id}',[ClientController::class, 'details'])->name('page.details');

// route pour admin
Route::get('/connexion',[AdminController::class, 'admin'])->name('page.admin');
Route::get('/admin',[AdminController::class, 'accueil'])->name('admin.accueil');
Route::get('/addarticle',[AdminController::class, 'addarticle'])->name('admin.addarticle');
Route::get('/listearticle',[AdminController::class, 'listearticle'])->name('admin.listearticle');
Route::put('/editarticle/{id}',[AdminController::class, 'updateArticle'])->name('admin.editarticle1');
Route::get('/editarticle/{id}',[AdminController::class, 'editarticle'])->name('admin.editarticle');
Route::get('/gestionutilisateur', [AdminController::class, 'Gestionutilisateur'])->name('admin.gutilisateur');
Route::get('/stockarticle',[AdminController::class, 'stockarticle'])->name('admin.stockarticle');
Route::get('/profil',[AdminController::class, 'profil'])->name('admin.profil');
Route::post('/utilisateur/update/{id}', [AdminController::class, 'update'])->name('admin.utilisateur.update');
Route::post('/admin/pay/update/{id}',[AdminController::class, 'updatePay'])->name('pay.update');
Route::post('/admin/users/gestionrole/{id}/role',[AdminController::class, 'updaterole'])->name('admin.utilisateurG.update');



//route ajout type article
Route::post('/type',[AdminController::class, 'addType'])->name('create.type');
//route ajout  article
Route::post('/article',[AdminController::class, 'ajoutArticle'])->name('articles.store');
//route ajout details article
Route::post('/details', [AdminController::class, 'store'])->name('details.store');
//suppresionarticle
Route::delete('/articles/{id}', [AdminController::class, 'destroy'])->name('articles.destroy');
//suppresionpay
Route::delete('/pay/{id}', [AdminController::class, 'destroypay'])->name('pay.destroy');
// stock sortant
Route::get('/stocksortant',[AdminController::class, 'Stocksortant'])->name('stock.sortant');
//liste clients
Route::get('/listeclients',[AdminController::class, 'listeclients'])->name('liste.clients');
//addpayement
Route::get('/addpayement',[AdminController::class, 'ajoutpayement'])->name('add.payement');
Route::post('/storeType',[AdminController::class, 'TypePaiement'])->name('store.type');
Route::post('/storeMethode',[AdminController::class, 'methodePaiement'])->name('store.methode');
//ajout stock
Route::post('/admin/stock/ajouter/{article_id}', [AdminController::class, 'ajouterStock'])->name('admin.ajouterStock');
//clientpanier
Route::get('/panier', [ClientController::class, 'panier'])->name('client.panier');
// ajout commande
  Route::post('/commande/enregistrer', [ClientController::class, 'enregistrer'])->name('commande.enregistrer');
//commande valide
Route::get('/commande', [AdminController::class, 'validationcommande'])->name('admin.commande');
//commande valide

//ajout panier
Route::post('/panier/ajouter/{id}', [ClientController::class, 'ajouter'])->name('panier.ajouter');
//mise a jour panier
Route::post('/panier/modifier', [ClientController::class, 'modifierGlobal'])->name('panier.modifier.global');
//suppression panier
Route::get('/panier/supprimer/{id}', [ClientController::class, 'supprimerViaLien'])->name('panier.supprimer.lien');

// authentification admin
Route::post('/login',[AdminController::class, 'registerAdmin'])->name('create.log');
Route::get('/register', [AdminController::class, 'LoginForm'])->name('login');
Route::post('/administration',[AdminController::class, 'login'])->name('admin.auth');
Route::get('/deconnexion',[AdminController::class, 'logout'])->name("deconexion");
// authentification clients
Route::post('/inscription', [ClientController::class, 'registerClients'])->name('client.register');
Route::get('/connecter', [ClientController::class, 'connecter'])->name('client.connecte');
Route::post('/authentification', [ClientController::class,'login'])->name('client.auth');
