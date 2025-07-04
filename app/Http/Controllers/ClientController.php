<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    //page d'accueil clients
    public function accueil(){
        return view('pageclients.Acceuil');
    }
//page clients deja connecte
    public function connecter(){
        return view('pageclients.Acceuil');
    }
//inscription clients
    public function registerClients(Request $request)
    {
    $request->validate([
        'nom' => 'required|string',
        'prenom' => 'required|string',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        'adresse' => 'required|string',
        'telephone' => 'required|string',
    ]);

    $clients = User::create([
        'nom' => $request->nom,
        'prenom' => $request->prenom,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'adresse' => $request->adresse,
        'telephone' => $request->telephone,
        'role' => '1',
    ]);
    Auth::login($clients);

    toastify()->success('Votre compte été créer avec succès ✔');

    return redirect()->route('page.accueil')->with('Votre compte été créer avec succès', true);
}
//connexion clients
    public function login(Request $request){

        $credentials = $request->validate([
            "email"=>["required","email"],
            "password"=>["required"]

        ]);

            if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->role == 1) {
                 return redirect()->route('page.accueil');
            }
            }
            else {
                return redirect()->back()->with("error", "email ou mot de passe incorrect");
            }
     }

    }

