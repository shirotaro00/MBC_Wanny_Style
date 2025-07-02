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


// route pour admin
Route::get('/connexion',[AdminController::class, 'admin'])->name('page.admin');
Route::get('/admin',[AdminController::class, 'accueil'])->name('admin.accueil');
Route::get('/addarticle',[AdminController::class, 'addarticle'])->name('admin.addarticle');
Route::get('/listearticle',[AdminController::class, 'listearticle'])->name('admin.listearticle');
//route ajout categorie
Route::post('/categorie',[AdminController::class, 'addcat'])->name('create.categorie');
//route ajout type article
Route::post('/type',[AdminController::class, 'addType'])->name('create.type');
//route ajout  article
Route::post('/article',[AdminController::class, 'ajoutArticle'])->name('articles.store');
//route ajout details article
Route::post('/details', [AdminController::class, 'store'])->name('details.store');

// authentification admin
Route::post('/login',[AdminController::class, 'registerAdmin'])->name('create.log');
Route::get('/register', [AdminController::class, 'LoginForm'])->name('login');
Route::post('/administration',[AdminController::class, 'login'])->name('admin.auth');
Route::get('/deconnexion',[AdminController::class, 'logout'])->name("deconexion");
// authentification clients
Route::post('/inscription', [ClientController::class, 'registerClients'])->name('client.register');
Route::get('/connecter', [ClientController::class, 'connecter'])->name('client.connecte');
Route::post('/authentification', [ClientController::class,'login'])->name('client.auth');
