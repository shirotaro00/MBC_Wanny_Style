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
        'nom' => 'required|string|regex:/^[A-Za-zÀ-ÿ\s\-\'\.]+$/u',
        'prenom' => 'required|string|regex:/^[A-Za-zÀ-ÿ\s\-\'\.]+$/u',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed',
        'adresse' => 'required|string|regex:/^(?!\d+$).+$/',
        'telephone' => 'required|string|regex:/^\+?[0-9]{1,10}$/',
    ] ,$this->message());

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

    return redirect()->back()->with('Votre compte été créer avec succès');
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
         public function message()
    {
        return [
             'password.required' => 'Mot de passe est obligatoire',
            'password.min' => 'Mot de passe doit contenir au moins 6 caracteres',
            'password.confirmed' => 'Mot de passe non identique',
            'telephone.regex' => 'Utilise numero valide',
            'email.required' => 'Entrez une email valide',
            'adresse.regex' => 'Entrez un adresse valide',
            'email.unique' => 'l\'email est déjà utilisé',
            'email.required' => 'l\'email est obligatoire',
            'email.email' => 'l\'email doit être une adresse email valide',
            'nom.required' => 'le nom est obligatoire',
            'prenom.required' => 'le prénom est obligatoire',
            'adresse.required' => 'l\'adresse est obligatoire',
            'telephone.required' => 'le numéro de téléphone est obligatoire',
          'prenom.required' => 'Le prénom est obligatoire',
            'prenom.regex' => 'Entrez un prenom valide ',
            'nom.regex'=>"Entrez nom valide",
            'adresse.regex' => 'Entrez un adresse valide',

        ];
    }

    }

