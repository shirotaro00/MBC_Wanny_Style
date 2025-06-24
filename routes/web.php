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

Route::get('/', function () {
    return view('pageclients/Acceuil');
});

// route pour admin
Route::get('/connexion', function () {
    return view('pageadmin/login/loginadmin');
});
// authentification admin
Route::post('/login',[AdminController::class, 'registerAdmin'])->name('create.log');
Route::get('/register', [AdminController::class, 'LoginForm'])->name('login');
// authentification clients
Route::post('/inscription', [ClientController::class, 'registerClients'])->name('client.register');
Route::get('/connecter', [ClientController::class, 'connecter'])->name('client.connecte');
