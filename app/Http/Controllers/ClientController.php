<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Commande;
use App\Models\Paiement;
use Illuminate\Http\Request;
use App\Models\DetailCommande;
use App\Models\MethodePaiement;
use Illuminate\Support\Facades\Log;
use App\Notifications\CommandeRecue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    //page d'accueil clients
    public function accueil()
    {

        $articles = Article::with(['TypeArticle', 'detailArticle'])->get();
        return view('pageclients.Acceuil', compact('articles'));
    }
    //page article clients
    public function article()
    {

        $articles = Article::with(['TypeArticle', 'detailArticle'])->get();
        return view('pageclients.Article', compact('articles'));
    }

    //page details articles

    public function details($id)
    {


        $articles = Article::with(['TypeArticle', 'detailArticle'])->findOrFail($id);
        return view('pageclients.DetailArticle', compact('articles'));
    }


    //page panier clients
    public function panier()
    {
        $methode = MethodePaiement::with(['TypePaiement'])->get();
        return view('pageclients.Panier', compact('methode'));
    }
    //profil client
    public function profil()
    {
        $clients = Auth::user();
        return view('pageclients.Profil', compact('clients'));
    }

    // page paiement

    public function paiement()
    {

        $commandes = Commande::with([
            'user',
            'paiements',
            'DetailCommande.article'
        ])
            ->where('user_id', Auth::id())
            ->where('statut', 'validée')
            ->latest()
            ->get();
        $methode = MethodePaiement::with(['TypePaiement'])->get();
        return view('pageclients.Paiement', compact('commandes', 'methode'));
    }

    // historique client achats
    public function historique()
    {

        $commandes = Commande::with([
            'user',
            'DetailCommande.article',
            'DetailCommande.article.TypeArticle',
            'DetailCommande.article.detailArticle',
            'DetailCommande.TypeArticle',
            'DetailCommande.detailArticle',
        ])
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('pageclients.Historique', compact('commandes'));
    }


    //page clients deja connecte
    public function connecter()
    {
        return view('pageclients.Acceuil');
    }
    //inscription clients
    public function registerClients(Request $request)
    {
        try {
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

            toastify()->success('Votre compte été créer avec succès !');

            return redirect()->back()->with('Votre compte été créer avec succès !');
        } catch (\Exception $e) {
            toastify()->error('Une erreur est survenue lors de la création du compte. Veuillez réessayer.');
            return redirect()->back()->withInput();
        }
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
                toastify()->success('Vous êtes connecté !');
                return redirect()->route('page.accueil');
            }
        } else {
            toastify()->error('Email ou mot de passe incorrect.');
            return redirect()->back()->with('error', 'Email ou mot de passe incorrect.');
        }
    }
    // ajout panier
    public function ajouter(Request $request, $id)
    {
        $articles = Article::with(['typeArticle', 'detailArticle'])->findOrFail($id);
        $quantite = (int) $request->input('quantite', 1);

        $panier = session()->get('panier', []);
        $photo = $articles->photo ?? null;
        $categorie = $articles->categorie ?? '';
        $taille = $articles->taille ?? '';
        $type = $articles->typeArticle->type ?? '';
        $couleur = $articles->detailArticle->couleur ?? '';

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
                'categorie' => $categorie,
                'type' => $type,
                'couleur' => $couleur,
                'taille' => $taille,
                'photo' => $photo
            ];
        }


        session()->put('panier', $panier);

        $panierCount = array_sum(array_column($panier, 'quantite'));
        session()->put('panierCount', $panierCount);
        toastify()->success('Article ajouté au panier!');

        return redirect()->route('client.panier')->with('success', 'Article ajouté au panier.');
    }



    //modification panier

    public function modifierGlobal(Request $request)
    {
      $id = $request->input('id');
    $quantite = (int)$request->input('quantite');

    $panier = session()->get('panier', []);

    if (!isset($panier[$id])) {
        return response()->json(['error' => 'Article introuvable dans le panier.'], 404);
    }

    $article = Article::find($id);
    if (!$article) {
        return response()->json(['error' => 'Article introuvable.'], 404);
    }

    if ($quantite > $article->quantite) {
        return response()->json(['error' => "Quantité demandée dépasse le stock disponible ({$article->quantite})."], 400);
    }

    $panier[$id]['quantite'] = max(1, $quantite);
    session()->put('panier', $panier);

    $sous_total = $panier[$id]['prix'] * $panier[$id]['quantite'];
    $total = 0;
    foreach ($panier as $item) {
        $total += $item['prix'] * $item['quantite'];
    }

    return response()->json([
        'success' => true,
        'sous_total' => $sous_total,
        'sous_total_formate' => number_format($sous_total, 0, ',', ' '),
        'total' => $total,
        'total_formate' => number_format($total, 0, ',', ' '),
    ]);

    }

    //ajoute commande
    public function ajouterCommande(Request $request)
    {
        if (Auth::user()) {

            $request->validate([
                'date_livraison' => [
                    'required',
                    'date',
                    'after_or_equal:' . now()->addDays(3)->format('Y-m-d'),
                ],
            ], [
                'date_livraison.after_or_equal' => 'La date de livraison doit être au moins 3 jours après la date de commande.',
            ]);

            $panier = session()->get('panier', []);
            $total = collect($panier)->sum(fn($item) => $item['prix'] * $item['quantite']);


            $commande = Commande::create([
                'user_id' => Auth::id(),
                'date_commande' => now(),
                'reference_commande' => $this->genererReferenceCommande(),
                'date_livraison' => $request->input('date_livraison'),
                'statut' => 'en attente',
                'prix_total' => $total,
            ]);


            // Ajout des lignes de commande
            foreach ($panier as $article_id => $item) {
                Detailcommande::create([
                    'commande_id' => $commande->id,
                    'article_id' => $article_id,
                    'quantite' => $item['quantite'],
                    'prix_unitaire' => $item['prix'],
                ]);
                // Mettre à jour le stock de l'article
                $article = Article::find($article_id);
                if ($article) {
                    $article->quantite = max(0, $article->quantite - $item['quantite']);
                    $article->save();
                }
            }

            // Ajout des points de fidélité (1 point par article commandé, selon la quantité)
            $user = User::find(Auth::id());
            $totalPoints = 0;
            foreach ($panier as $item) {
                $totalPoints += $item['quantite'];
            }
            $user->point = ($user->point ?? 0) + $totalPoints;

            $user->save();

            $gerants = User::where('role', '0')->get();



            try {
                foreach ($gerants as $gerant) {
                    $gerant->notify(new CommandeRecue($commande));
                }
                session()->forget('panier');

                toastify()->success('Commande ajoutée avec succès!');

                return redirect()->route('client.historique')->with('success', 'Commande ajoutée avec succès.');
            } catch (\Exception $e) {
                // Loguer l'erreur pour le développeur
                Log::error('Erreur lors de l\'envoi de l\'email : ' . $e->getMessage());

                // Stocker un message d'erreur pour la vue
                toastify()->error('Impossible d\'envoyer l\'e-mail aux gérants. Vérifiez votre connexion.');
                return redirect()->back();
            }
        } else {
            toastify()->error('Veuillez vous connecter!');

            return redirect()->back()->with('error', 'Veuillez vous connecter.');
        }
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

    // accueil vers panier
    public function MonPanier($id)
    {
        $articles = Article::with(['typeArticle', 'detailArticle'])->findOrFail($id);

        $panier = session()->get('panier', []);
        $photo = $articles->photo ?? null;
        $categorie = $articles->categorie ?? '';
        $taille = $articles->taille ?? '';
        $type = $articles->typeArticle->type ?? '';
        $couleur = $articles->detailArticle->couleur ?? '';


        if (isset($panier[$id])) {
            $panier[$id]['quantite'] += 1;
        } else {
            $panier[$id] = [
                'nom' => $articles->nom,
                'prix' => $articles->prix,
                'categorie' => $categorie,
                'type' => $type,
                'couleur' => $couleur,
                'taille' => $taille,
                'photo' => $photo,
                'quantite' => 1,
            ];
        }

        session()->put('panier', $panier);
        $panierCount = array_sum(array_column($panier, 'quantite'));
        session()->put('panierCount', $panierCount);
        toastify()->success('Article ajouté au panier!');

        return redirect()->route('client.panier')->with('success', 'Article ajouté au panier !');
    }

    // ajout paiement
    public function paiementStore(Request $request)
    {

        $request->validate([
            'montant' => 'required|numeric|min:0.01',
            'Ref_paiement' => 'required|string|min:10|max:10',
            'methode_paiement_id' => 'required|exists:methode_paiements,id',
        ]);

        $commande = Commande::where('user_id', Auth::id())
            ->where('statut', 'validée')
            ->latest()
            ->first();

        if (!$commande) {
            toastify()->error('Aucune commande à payer trouvée.');
            return redirect()->back();
        }

        $total = $commande->detailCommande->sum(function ($detail) {
            return $detail->prix_unitaire * $detail->quantite;
        });


        $totalDejaPaye = Paiement::where('commande_id', $commande->id)->sum('montant');

        $resteAPayer = $total - $totalDejaPaye;

        if ($resteAPayer <= 0) {
            toastify()->info("Commande déjà totalement payée.");
            return redirect()->back();
        }

        $montantPaye = $request->input('montant');

        if ($totalDejaPaye == 0 && $montantPaye < $total * 0.5) {
            toastify()->error("Vous devez payer au moins 50% du montant total.");
            return redirect()->back();
        }

        if ($montantPaye > $resteAPayer) {
            toastify()->error("Le montant payé dépasse le reste à payer ({$resteAPayer} MGA).");
            return redirect()->back();
        }

        Paiement::create([
            'montant' => $montantPaye,
            'Ref_paiement' => $request->input('Ref_paiement'),
            'date_paiement' => now(),
            'user_id' => Auth::id(),
            'commande_id' => $commande->id,
            'methode_paiement_id' => $request->input('methode_paiement_id'),
        ]);

        $totalPayeApres = $totalDejaPaye + $montantPaye;
        $commande->statut_paiement = $totalPayeApres >= $total ? 'payé' : 'acompte';
        $commande->save();

        toastify()->success("Paiement de {$montantPaye} MGA enregistré avec succès. Reste à payer : " . ($total - $totalPayeApres) . " MGA.");
        return redirect()->back();
    }


    // Filtrage des articles selon les paramètres GET
    public function articles(Request $request)
    {
        $query = Article::with('detailArticle');

        $categories = $request->input('categorie', []);
        $tailles = $request->input('taille', []);
        $couleurs = $request->input('couleur', []);

        // Filtre catégorie
        if (!empty($categories)) {
            $query->whereIn('categorie', $categories);
        }

        // Filtre taille
        if (!empty($tailles)) {
            $query->whereIn('taille', $tailles);
        }

        // Filtre couleur (relation)
        if (!empty($couleurs)) {
            $query->whereHas('detailArticle', function ($q) use ($couleurs) {
                $q->whereIn('couleur', $couleurs);
            });
        }

        $articles = $query->get();

        // Afficher un message si aucun article ne correspond
        $message = null;
        if ($articles->isEmpty() && ($categories || $tailles || $couleurs)) {
            $message = 'Aucun article ne correspond à votre recherche.';
        }

        return view('pageclients.Article', [
            'articles' => $articles,
            'categories' => $categories,
            'tailles' => $tailles,
            'couleurs' => $couleurs,
            'message' => $message,
        ]);
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
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        toastify()->success('Vous êtes déconnecté !');
        return redirect()->route('page.accueil');
    }
    public function genererReferenceCommande(): string
    {
        $date = now()->format('Ymd');
        $dernierID = \App\Models\Commande::max('id') + 1;
        return 'WANNY-ARTICLE-' . $date . '-' . str_pad($dernierID, 4, '0', STR_PAD_LEFT);
    }
}
