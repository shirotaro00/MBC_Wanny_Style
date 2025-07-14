<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    //page d'accueil clients
    public function accueil(){

        $articles = Article::with(['typeArticle', 'detailArticle'])->get();
        return view('pageclients.Acceuil',compact('articles'));
    }
    //page article clients
    public function article(){

        $articles = Article::with(['typeArticle', 'detailArticle'])->get();
        return view('pageclients.Article',compact('articles'));
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
        'password' => 'required|min:6|confirmed',
        'adresse' => 'required|string',
        'telephone' => 'required|string|regex:/^\+?[0-9]{1,10}$/',
    ] ,$this->messages());

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

    return redirect()->back()->with('Votre compte été créer avec succès', true);
}
//connexion clients
    public function login(Request $request){

        $credentials = $request->validate([
            "email"=>["required","email"],
            "password"=>["required"]

      ], $this->messages());

            if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->role == 1) {
                 return redirect()->route('page.accueil');
            }
            }
            else {
                    return redirect()->back()
        ->withInput()
        ->with([
            'login_error' => 'Email ou mot de passe incorrect.',
            'form_type' => 'login'
        ]);
            }
     }
         public function messages()
    {
        return [
            'password.required' => 'le mot de passe est obligatoire',
            'password.min' => 'le mot de passe doit contenir au moins 6 caracteres',
            'password.confirmed' => 'le mot de passe ne correspondent pas',
            'telephone.regex' => 'le numéro de téléphone valide',
            'email.unique' => 'l\'email est déjà utilisé',
            'email.required' => 'l\'email est obligatoire',
            'email.email' => 'l\'email doit être une adresse email valide',
            'nom.required' => 'le nom est obligatoire',
            'prenom.required' => 'le prénom est obligatoire',
            'adresse.required' => 'l\'adresse est obligatoire',
            'telephone.required' => 'le numéro de téléphone est obligatoire',
            'nom.string' => 'le nom doit être une chaîne de caractères',
            'prenom.string' => 'le prénom doit être une chaîne de caractères',
            'adresse.string' => 'l\'adresse doit être une chaîne de caractères',

        ];
    }

    }

