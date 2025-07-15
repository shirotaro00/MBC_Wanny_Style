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
    public function accueil()
    {

        $articles = Article::with(['typeArticle', 'detailArticle'])->get();
        return view('pageclients.Acceuil', compact('articles'));
    }
    //page article clients
    public function article()
    {

        $articles = Article::with(['typeArticle', 'detailArticle'])->get();
        return view('pageclients.Article', compact('articles'));
    }

    //page details articles

    public function details($id)
    {

        $articles = Article::with(['typeArticle', 'detailArticle'])->findOrFail($id);
        return view('pageclients.DetailArticle', compact('articles'));
    }


    //page panier clients
    public function panier()
    {


        return view('pageclients.Panier');
    }


    //page clients deja connecte
    public function connecter()
    {
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
        ], $this->message());
        // Corriger automatiquement la casse si besoin
        $nom = collect(explode(' ', strtolower($request->input('nom'))))
            ->map(fn($mot) => ucfirst($mot))
            ->implode(' ');
        $prenom = collect(explode(' ', strtolower($request->input('prenom'))))
            ->map(fn($mot) => ucfirst($mot))
            ->implode(' ');
        $adresse = collect(explode(' ', strtolower($request->input('adresse'))))
            ->map(fn($mot) => ucfirst($mot))
            ->implode(' ');


        $clients = User::create([
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'adresse' => $adresse,
            'telephone' => $request->telephone,
            'role' => '1',
        ]);
        Auth::login($clients);

        toastify()->success('Votre compte été créer avec succès ✔');

        return redirect()->back()->with('Votre compte été créer avec succès');
    }
    //connexion clients
    public function login(Request $request)
    {

        $credentials = $request->validate([
            "email" => ["required", "email"],
            "password" => ["required"]

        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->role == 1) {
                return redirect()->route('page.accueil');
            }
        } else {
            return redirect()->back()->with("error", "email ou mot de passe incorrect");
        }
    }
    // ajout panier
    public function ajouter(Request $request, $id)
    {
        $articles = Article::findOrFail($id);
        $quantite = (int) $request->input('quantite', 1);

        $panier = session()->get('panier', []);
        $photo = $articles->photo ?? null;

        // Calculer la quantité totale demandée (si déjà dans le panier)
        $quantiteTotale = $quantite;
        if (isset($panier[$id])) {
            $quantiteTotale += $panier[$id]['quantite'];
        }

        // Vérifier le stock disponible
        if ($quantiteTotale > $articles->quantite) {
            toastify()->error('Quantité demandée supérieure au stock disponible !');
            return redirect()->back()->with('error', 'Quantité demandée supérieure au stock disponible !');
        }

        if (isset($panier[$id])) {
            $panier[$id]['quantite'] += $quantite;
        } else {
            $panier[$id] = [
                'nom' => $articles->nom,
                'prix' => $articles->prix,
                'quantite' => $quantite,
                'photo' => $photo
            ];
        }

        session()->put('panier', $panier);
        toastify()->success('Article ajouté au panier!');

        return redirect()->route('client.panier')->with('success', 'Article ajouté au panier.');
    }
    //modification panier

public function modifierGlobal(Request $request)
{
    $quantites = $request->input('quantites');
    $panier = session()->get('panier', []);

    $erreurs = [];

    foreach ($quantites as $id => $quantite) {
        // Vérifie si l'article existe dans le panier
        if (isset($panier[$id])) {
            // Recherche l'article en base de données
            $article = Article::find($id);

            if ($article) {
                if ((int)$quantite > $article->quantite) {
                    $erreurs[] = "La quantité demandée pour « {$article->nom} » dépasse le stock disponible ({$article->quantite}).";
                } else {

                    $panier[$id]['quantite'] = max(1, (int)$quantite);
                }
            } else {
                $erreurs[] = "Article avec ID {$id} introuvable.";
            }
        }
    }

    // Si erreurs → ne pas mettre à jour le panier
    if (!empty($erreurs)) {
        toastify()->error('La quantité demandée dépasse le stock disponible .');
        return redirect()->back()->withErrors($erreurs);
    }

    // Sinon → mettre à jour le panier
    session()->put('panier', $panier);

    toastify()->success('Panier a été mis à jour avec succès!');


    return redirect()->back()->with('success', 'Panier mis à jour avec succès.');
}



    //suppresion panier via lien
    public function supprimerViaLien($id)
    {
        $panier = session()->get('panier', []);
        if (isset($panier[$id])) {
            unset($panier[$id]);
            session()->put('panier', $panier);
        }

        toastify()->success('Article supprimé au panier!');

        return redirect()->back()->with('success', 'Article supprimé du panier.');
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
            'nom.regex' => "Entrez nom valide",
            'adresse.regex' => 'Entrez un adresse valide',

        ];
    }
}
