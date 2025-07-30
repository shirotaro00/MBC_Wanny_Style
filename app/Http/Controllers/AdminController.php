<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Stock;
use App\Models\Article;
use App\Models\Commande;
use App\Models\Paiement;
use App\Models\TypeArticle;
use App\Models\TypePaiement;
use Illuminate\Http\Request;
use App\Models\DetailArticle;
use App\Models\DetailCommande;
use App\Models\MethodePaiement;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Notifications\CommandeValideeClient;

class AdminController extends Controller
{
    //page login admin
    public function admin()
    {
        return view('pageadmin.login.loginadmin');
    }
    //accueil dashboard
    public function accueil()
    {
        return view('pageadmin.dashbord.dashboard');
    }
    //creation login & register
    public function LoginForm()
    {
        return view("pageadmin.login.loginadmin");
    }

    public function dashbordadmin()
    {

        return view("pageadmin.dashbord.dashboard");
    }

    // page sortant
    public function Stocksortant()
    {
        return view("pageadmin.dashbord.stocksortant");
    }

    // page gestion utilisateur
    public function Gestionutilisateur()
    {
        $utilisateurs = User::where('role', 3)->get();
        $utilisateurs = User::where('role', '!=', '0')->get();

        return view("pageadmin.dashbord.Gestionutilisateur", compact('utilisateurs'));
    }

    // liste clients

    public function listeclients()
    {
        $clients = User::where('role', '1')->get();
        return view("pageadmin.dashbord.listeclients", compact("clients"));
    }

    // addpayement

    public function ajoutpayement()
    {
        $types = TypePaiement::all();
        $methodes = MethodePaiement::with(['typePaiement'])->get();
        return view("pageadmin.dashbord.ajoutpayement", compact('types', 'methodes'));
    }


    //page modification
    public function editarticle($id)
    {
        $article = Article::with(['typeArticle', 'detailArticle'])->findOrFail($id);
        return view("pageadmin.dashbord.nodificationarticle", compact("article"));
    }


    //page stock
    public function stockarticle()
    {
        $articles = Article::all();
        $stocks = Stock::with(['article.detailArticle', 'article.typeArticle'])->get();
        return view("pageadmin.dashbord.stock", compact('articles', 'stocks'));
    }

    //page profil
    public function profil()
    {
        $user = Auth::user();
        return view('pageadmin.dashbord.profil', compact('user'));
    }


    //page liste article
    public function listearticle()
    {
        $articles = Article::with(['typeArticle', 'detailArticle'])->get();

        return view("pageadmin.dashbord.listearticle", compact('articles'));
    }


    //page ajout article
    public function addarticle()
    {
        $types = TypeArticle::all();
        $details = DetailArticle::all();
        return view("pageadmin.dashbord.Addarticle", compact("types", "details"));
    }

    //historique paiement

    public function historique_paiement()
    {
        $paiements = Paiement::with(['user', 'commande.detailCommande', 'commande.paiements', 'methodePaiement'])->latest()->get();

        return view("pageadmin.dashbord.historiquepayement", compact('paiements'));
    }

    //page validation commande
    public function validationcommande()
    {

        $commandes = Commande::with([
            'user',
            'DetailCommande.article',
            'DetailCommande.article.TypeArticle',
            'DetailCommande.article.detailArticle',
            'DetailCommande.TypeArticle',
            'DetailCommande.detailArticle',
        ])
            ->where('statut', 'en attente')
            ->latest()
            ->get();

        return view("pageadmin.dashbord.Commandeavalide", compact('commandes'));
    }
    //Validation de la commande
    public function valider($id)
    {
        $commande = Commande::findOrFail($id);
        $commande->statut = 'validée';
        $commande->save();
        $client = $commande->user;

        $client->notify(new CommandeValideeClient($commande));
        toastify()->success('Commande validé!');

        return redirect()->route('commande.validation')->with('success', 'Commande validée avec succès.');
    }
    //page des commandes deja valide
    public function commandesValide()
    {
        $commandes = Commande::where('statut', 'validée')
            ->with([
                'user',
                'DetailCommande.article',
                'DetailCommande.article.TypeArticle',
                'DetailCommande.article.detailArticle',
                'DetailCommande.TypeArticle',
                'DetailCommande.detailArticle',
            ])
            ->latest()
            ->get();

        return view("pageadmin.dashbord.commandevalide", compact('commandes'));
    }
    // export pdf
    public function genererFacture($id)
    {
        $commande = Commande::with([
            'user',
            'paiements',
            'Detailcommande.article',
            'DetailCommande.article.TypeArticle',
            'DetailCommande.article.detailArticle',
            'DetailCommande.TypeArticle',
            'DetailCommande.detailArticle'
        ])->findOrFail($id);

        $pdf = Pdf::loadView('facture', compact('commande'));
        return $pdf->download('facture_' . $commande->id . '.pdf');
    }

    //inscription admin
    public function registerAdmin(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|regex:/^[A-Za-zÀ-ÿ\s\-\'\.]+$/u',
            'prenom' => 'required|string|regex:/^[A-Za-zÀ-ÿ\s\-\'\.]+$/u',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'adresse' => 'required|regex:/^(?!\d+$).+$/',
            'telephone' => 'required|string|regex:/^\+?[0-9]{1,10}$/',
        ], $this->messages());

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


        $user = User::create([
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'adresse' => $adresse,
            'telephone' => $request->telephone,
            'role' => '3',
        ]);

        Auth::login($user);

        toastify()->success('Votre compte a été créé avec succès ✔');

        return redirect()->route('admin.accueil')->with('success', 'Votre compte a été créé avec succès');
    }
    //connexion admin
    public function login(Request $request)
    {

        $credentials = $request->validate([
            "email" => ["required", "email"],
            "password" => ["required"]

        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->role == 0) {
                toastify()->success('Vous êtes connecté ✔');
                return redirect()->route('admin.dashboard');
            } else if (Auth::user()->role == 3) {
                toastify()->success('Vous êtes connecté ✔');
                return redirect()->route('admin.accueil');
            } else if (Auth::user()->role == 6) {
                toastify()->success('Vous êtes connecté ✔');
                return redirect()->route('admin.accueil');
            }
        } else {
            return redirect()->back()->with("error", "email ou mot de passe incorrect");
        }
    }
    //ajout type article
    public function addType(Request $request)
    {

        if (auth()->user()->role === '3') {
            toastify()->error('Action non autorisée pour les lecteurs.');
            return redirect()->back()->with('error', 'Action non autorisée pour les lecteurs.');
        } else {
            $request->validate([
                'type' => [
                    'required',
                    'string',
                    'regex:/^[\pL\s\-\'’]+$/u',
                ],
            ], $this->messages());

            // Corriger automatiquement la casse si besoin
            $type = collect(explode(' ', strtolower($request->input('type'))))
                ->map(fn($mot) => ucfirst($mot))
                ->implode(' ');
            TypeArticle::create([
                'type' => $type,
            ]);
            toastify()->success('Type article  ajouté ✔');

            return redirect()->route('admin.addarticle')->with('success', 'Type article  ajouté');
        }
    }

    //ajout article
    public function ajoutArticle(Request $request)
    {

        if (auth()->user()->role === '3') {
            toastify()->error('Action non autorisée pour les lecteurs.');
            return redirect()->back()->with('error', 'Action non autorisée pour les lecteurs.');
        } else {
            $request->validate([
                'nom' => 'required|string',
                'categorie' => 'required|string',
                'prix' => 'required|integer|min:0',
                'quantite' => 'required|integer|min:0',
                'photo' => 'required|image|mimes:jpeg,png,jpg',
                'description' => 'required|string',
                'taille' => 'required|in:L,M,S,XL,XXL',
                'type_article_id' => 'required|exists:type_articles,id',
                'detail_article_id' => 'required|exists:detail_articles,id'
            ], $this->messages());

            $filename = time() . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path("assets/upload"), $filename);

            $nom = collect(explode(' ', strtolower($request->input('nom'))))
                ->map(fn($mot) => ucfirst($mot))
                ->implode(' ');
            $categorie = collect(explode(' ', strtolower($request->input('categorie'))))
                ->map(fn($mot) => ucfirst($mot))
                ->implode(' ');
            $description = collect(explode(' ', strtolower($request->input('description'))))
                ->map(fn($mot) => ucfirst($mot))
                ->implode(' ');

            Article::create([
                'nom' => $nom,
                'categorie' => $categorie,
                'prix' => $request->prix,
                'quantite' => $request->quantite,
                'photo' => $filename,
                'description' => $description,
                'taille' => $request->taille,
                'type_article_id' => $request->type_article_id,
                'detail_article_id' => $request->detail_article_id
            ]);

            toastify()->success('article  ajouté ✔');

            return redirect()->route('admin.addarticle')->with('success', 'article  ajouté');
        }
    }
    //ajoute details article
    public function store(Request $request)
    {
        if (auth()->user()->role === '3') {
            toastify()->error('Action non autorisée pour les lecteurs.');
            return redirect()->back()->with('error', 'Action non autorisée pour les lecteurs.');
        } else {
            $request->validate([
                'couleur' => [
                    'required',
                    'string',
                    'regex:/^(rouge|bleu|vert|noir|blanc|gris|grenat|jaune|orange|marron|violet|rose)$/i',
                ]
            ], $this->messages());
            $couleur = collect(explode(' ', strtolower($request->input('couleur'))))
                ->map(fn($mot) => ucfirst($mot))
                ->implode(' ');
            DetailArticle::create([
                'couleur' => $couleur,
            ])->save();

            toastify()->success('details article  ajouté ✔');

            return redirect()->route('admin.addarticle')->with('success', 'details article  ajouté');
        }
    }
    //modification
    public function updateArticle(Request $request, $id)
    {
        if (auth()->user()->role === '3') {
            toastify()->error('Action non autorisée pour les lecteurs.');
            return redirect()->back()->with('error', 'Action non autorisée pour les lecteurs.');
        } else {
            $request->validate([
                'nom' => 'required|string',
                'categorie' => 'required|string',
                'prix' => 'required|integer|min:0',
                'quantite' => 'required|integer',
                'description' => 'required|string',
                'photo' => 'nullable|image|mimes:jpg,png,jpeg',
                'taille' => 'required|string',
                'type_article' => 'required|string',
                'detail_article' => 'required|string',
            ], $this->messages());

            $article = Article::findOrFail($id);

            // Gestion du fichier photo
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/upload'), $filename);

                // Supprime l'ancienne photo si besoin
                if ($article->photo && file_exists(public_path('assets/upload/' . $article->photo))) {
                    unlink(public_path('assets/upload/' . $article->photo));
                }

                $article->photo = $filename;
            }


            // Corriger automatiquement la casse si besoin
            $nom = collect(explode(' ', strtolower($request->input('nom'))))
                ->map(fn($mot) => ucfirst($mot))
                ->implode(' ');
            $categorie = collect(explode(' ', strtolower($request->input('categorie'))))
                ->map(fn($mot) => ucfirst($mot))
                ->implode(' ');
            $description = collect(explode(' ', strtolower($request->input('description'))))
                ->map(fn($mot) => ucfirst($mot))
                ->implode(' ');
            // Mise à jour des champs
            $article->update([
                'nom' => $nom,
                'categorie' => $categorie,
                'prix' => $request->prix,
                'quantite' => $request->quantite,
                'description' => $description,
                'taille' => $request->taille,
            ]);

            // Mettre à jour le type d'article
            $type = TypeArticle::firstOrCreate(['type' => $request->type_article]);
            $article->type_article_id = $type->id;

            // Mettre à jour le détail de l'article
            $detail = DetailArticle::firstOrCreate(['couleur' => $request->detail_article]);
            $article->detail_article_id = $detail->id;

            $article->save();

            toastify()->success('Article mis à jour avec succès ✔');
            return redirect()->route('admin.listearticle')->with('success', 'Article mis à jour avec succès');
        }
    }
    //suppresion
    public function destroy($id)
    {
        if (auth()->user()->role === '3') {
            toastify()->error('Action non autorisée pour les lecteurs.');
            return redirect()->back()->with('error', 'Action non autorisée pour les lecteurs.');
        } else {
            $article = Article::findOrFail($id);
            $article->delete();
            toastify()->success('Article supprimé avec succès ✔');
            return redirect()->back()->with('success', 'Article supprimé avec succès.');
        }
    }

    //suppresion pay
    public function destroypay($id)
    {
        if (auth()->user()->role === '3') {
            toastify()->error('Action non autorisée pour les lecteurs.');
            return redirect()->back()->with('error', 'Action non autorisée pour les lecteurs.');
        } else {
            $methodes = MethodePaiement::findOrFail($id);
            $methodes->delete();
            toastify()->success('methode paiement supprimée ✔');
            return redirect()->back()->with('success', 'Methode de paiement supprimée avec succès.');
        }
    }
    //ajout stock
    public function ajouterStock(Request $request, $article_id)
    {
        if (auth()->user()->role === '3') {
            toastify()->error('Action non autorisée pour les lecteurs.');
            return redirect()->back()->with('error', 'Action non autorisée pour les lecteurs.');
        } else {
            $request->validate([
                'quantite' => 'required|integer|min:0',
                'date_stock' => 'required',
                'date_format:Y-m-d',
                'article_id' => 'required|exists:articles,id'
            ], $this->messages());

            $stock = Stock::where('article_id', $article_id)->first();

            if ($stock) {
                $stock->quantite += $request->quantite;
                $stock->date_stock = $request->date_stock;
                $stock->save();
            } else {
                Stock::create([
                    'quantite' => $request->quantite,
                    'date_stock' => $request->date_stock,
                    'article_id' => $request->article_id
                ]);
            }

            $article = Article::find($article_id);
            if ($article) {
                $article->quantite += $request->quantite;
                $article->save();
            }

            toastify()->success('stock ajouté ✔');

            return redirect()->route('admin.stockarticle')->with('success', 'stock ajouté ');
        }
    }
    //type paiement
    public function TypePaiement(Request $request)
    {
        if (auth()->user()->role === '3') {
            toastify()->error('Action non autorisée pour les lecteurs.');
            return redirect()->back()->with('error', 'Action non autorisée pour les lecteurs.');
        } else {
            $request->validate([
                'type' => 'required|string|regex:/^[A-Za-z]+$/',
                'photo' => 'required|image|mimes:jpeg,png,jpg'
            ], $this->messages());
            $filename = time() . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path("assets/upload"), $filename);
            $type = collect(explode(' ', strtolower($request->input('type'))))
                ->map(fn($mot) => ucfirst($mot))
                ->implode(' ');
            TypePaiement::create([
                'type' => $type,
                'photo' => $filename,
            ]);
            toastify()->success('type paiement ajouté ✔');

            return redirect()->route('add.payement')->with('success', 'type paiement ajouté');
        }
    }
    //methode paiement
    public function methodePaiement(Request $request)
    {
        if (auth()->user()->role === '3') {
            toastify()->error('Action non autorisée pour les lecteurs.');
            return redirect()->back()->with('error', 'Action non autorisée pour les lecteurs.');
        } else {
            $request->validate([
                'nom' => 'required|string|regex:/^[A-Za-z]+$/',
                'telephone' => 'required|string|regex:/^\+?[0-9]{1,10}$/',
                'type_paiement_id' => 'required|exists:type_paiements,id',
            ], $this->messages());

            $nom = collect(explode(' ', strtolower($request->input('nom'))))
                ->map(fn($mot) => ucfirst($mot))
                ->implode(' ');

            MethodePaiement::create([
                'nom' => $nom,
                'telephone' => $request->telephone,
                'type_paiement_id' => $request->type_paiement_id,
            ]);
            toastify()->success('methode paiement ajouté ✔');

            return redirect()->route('add.payement')->with('success', 'methode paiement ajouté');
        }
    }
    //modification pay
    public function updatePay(Request $request, $id)
    {
        if (auth()->user()->role === '3') {
            toastify()->error('Action non autorisée pour les lecteurs.');
            return redirect()->back()->with('error', 'Action non autorisée pour les lecteurs.');
        }

        $request->validate([
            'nom' => 'required|string|regex:/^[A-Za-z]+$/',
            'telephone' => 'required|string|regex:/^\+?[0-9]{1,10}$/',
        ], $this->messages());

        $methode = MethodePaiement::findOrFail($id);
        $methode->nom = $request->nom;
        $methode->telephone = $request->telephone;
        $methode->save();

        toastify()->success('Méthode de paiement mise à jour avec succès ✔');
        return redirect()->route('add.payement')->with('success', 'Méthode de paiement mise à jour avec succès');
    }
    //update profil
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|regex:/^[A-Za-zÀ-ÿ\s\-\'\.]+$/u',
            'prenom' => 'required|string|regex:/^[A-Za-zÀ-ÿ\s\-\'\.]+$/u',
            'adresse' => 'required|string|regex:/^(?!\d+$).+$/',
            'telephone' => 'required|string|regex:/^\+?[0-9]{1,10}$/',
            'email' => 'required|email',
            'password' => 'nullable|string|min:6',
        ], $this->messages());

        $utilisateur = User::findOrFail($id);

        $utilisateur->nom = $request->nom;
        $utilisateur->prenom = $request->prenom;
        $utilisateur->adresse = $request->adresse;
        $utilisateur->telephone = $request->telephone;
        $utilisateur->email = $request->email;

        if ($request->filled('password')) {
            $utilisateur->password = Hash::make($request->password);
        }

        $utilisateur->save();

        return redirect()->back()->with('success', 'Utilisateur mis à jour avec succès');
    }
    //message d'erreur password
    public function messages()
    {
        return [
            //Inscription login lecteur
            'password.required' => 'Mot de passe est obligatoire',
            'password.min' => 'Mot de passe doit contenir au moins 6 caracteres',
            'password.confirmed' => 'Mot de passe non identique',
            'telephone.regex' => 'Utilise numero valide',
            'email.required' => 'Entrez une email valide',
            'adresse.regex' => 'Entrez un adresse valide',

            //Article ajout
            'prix.required' => 'Le prix est obligatoire.',
            'prix.integer' => 'Le prix doit être un nombre entier.',
            'prix.min' => 'Le prix ne peut pas être négatif.',
            'couleur.regex' => 'Entrez un couleur valide',
            'couleur.required' => 'La couleur est obligatoire',

            'quantite.required' => 'La quantité est obligatoire.',
            'quantite.integer' => 'La quantité doit être un nombre entier.',
            'quantite.min' => 'La quantité ne peut pas être négative.',

            'type.regex' => 'Entrez un type valide',
            'type.required' => 'Le type est obligatoire',
            //pay
            'nom.required' => 'Le nom est obligatoire',
            'nom.regex' => 'Entrez un nom valide',
            'telephone.required' => 'Le téléphone est obligatoire',

            //
            'photo.required' => 'La photo est obligatoire',
            'photo.image' => 'La photo doit être une image',
            'photo.mimes' => 'La photo doit être au format jpeg, png ou jpg',
            'photo.max' => 'La photo ne doit pas dépasser 2 Mo',

            'prenom.required' => 'Le prénom est obligatoire',
            'prenom.regex' => 'Entrez un prenom valide ',
            'nom.regex' => "Entrez nom valide"


        ];
    }
    // modification role
    public function updaterole(Request $request, $id)
    {
        $request->validate(
            [
                'role' => 'required|in:0,3,6',
            ]
        );
        $users = User::findOrFail($id);
        $users->role = $request->role;
        $users->save();
        return redirect()->route('admin.gutilisateur')->with('success', 'rôle mis a jours');
    }
    //deconnexion
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        toastify()->success('Vous êtes déconnecté ✔');
        return redirect()->route('page.admin');
    }



public function commandesValideParJour(Request $request)
{

    $articlesVendusJour = DetailCommande::whereDate('created_at', now())->sum('quantite');

    $nombreClients = User::where('role',1)->count();

    $inventaires = Article::with(['detailArticle'])
        ->get()
        ->map(function($article) {
            $stock_initial = $article->quantite ?? 0;
            $stock_sortant = DetailCommande::where('article_id', $article->id)->sum('quantite');
            $stock_restant = $stock_initial - $stock_sortant;
            return (object)[
                'article' => $article,
                'stock_initial' => $stock_initial,
                'stock_sortant' => $stock_sortant,
                'stock_restant' => $stock_restant,
            ];
        });

    $mois = $request->input('mois', Carbon::now()->month);
    $annee = $request->input('annee', Carbon::now()->year);

    $debutMois = Carbon::create($annee, $mois, 1)->startOfMonth();
    $finMois = Carbon::create($annee, $mois, 1)->endOfMonth();

    $articlesParSemaine = DB::table('detail_commandes')
        ->whereBetween('created_at', [$debutMois, $finMois])
        ->select(
            DB::raw('YEARWEEK(created_at, 1) as annee_semaine'),
            DB::raw('WEEK(created_at, 1) as semaine'),
            DB::raw('SUM(quantite) as total_articles')
        )
        ->groupBy('annee_semaine', 'semaine')
        ->orderBy('annee_semaine')
        ->get();

    $labels = [];
    $data = [];

    $semaineDebut = $debutMois->copy()->startOfWeek();
    $semaineFin = $finMois->copy()->endOfWeek();
    $semaines = [];
    $current = $semaineDebut->copy();
    while ($current->lte($semaineFin)) {
        $labels[] = 'Semaine ' . $current->weekOfYear;
        $semaines[] = $current->weekOfYear;
        $current->addWeek();
    }

    foreach ($semaines as $index => $numSemaine) {
        $val = $articlesParSemaine->firstWhere('semaine', $numSemaine);
        $data[] = $val ? $val->total_articles : 0;
    }

    return view('pageadmin.dashbord.dashboard', compact('labels', 'data', 'mois', 'annee','articlesVendusJour','nombreClients','inventaires'));
}


}



