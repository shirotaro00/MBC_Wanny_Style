<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\TypeArticle;
use Illuminate\Http\Request;
use App\Models\DetailArticle;
use App\Models\MethodePaiement;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


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

    // liste clients

    public function listeclients()
    {
        $clients = User::where('role', '1')->get();
        return view("pageadmin.dashbord.listeclients",compact("clients"));
    }

    // addpayement

    public function ajoutpayement()
    {
        $methodes = MethodePaiement::all();
        return view("pageadmin.dashbord.ajoutpayement",compact('methodes'));
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
        $admin = Auth::user();
        return view('pageadmin.dashbord.profil', compact('admin'));
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



    //inscription admin
    public function registerAdmin(Request $request)
    {
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'adresse' => 'required|string',
            'telephone' => 'required|string',
        ], $this->messages());



        $admin = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'role' => '0',
        ]);

        Auth::login($admin);

        toastify()->success('Votre compte été créer avec succès ✔');

        return redirect()->route('admin.accueil')->with('success', 'Votre compte été créer avec succès');
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
                return redirect()->route('admin.accueil');
            }
        } else {
            return redirect()->back()->with("error", "email ou mot de passe incorrect");
        }
    }
    //ajout type article
    public function addType(Request $request)
    {

        $request->validate([
            'nom' => 'required|string',
        ]);

        TypeArticle::create([
            'nom' => $request->nom,
        ]);
        toastify()->success('Type article  ajouté ✔');

        return redirect()->route('admin.addarticle')->with('success', 'Type article  ajouté');
    }

    //ajout article
    public function ajoutArticle(Request $request)
    {

        $request->validate([
            'nom' => 'required|string',
            'categorie' => 'required|in:homme,femme',
            'prix' => 'required|integer|min:0',
            'quantite' => 'required|integer|min:0',
            'photo' => 'required|image|mimes:jpeg,png,jpg',
            'description' => 'required|string',
            'taille' => 'required|in:L,M,S,XL,XXL',
            'date_ajout' => 'required|date',
            'type_article_id' => 'required|exists:type_articles,id',
            'detail_article_id' => 'required|exists:detail_articles,id'
        ]);
        $filename = time() . '.' . $request->photo->getClientOriginalExtension();
        $request->photo->move(public_path("assets/upload"), $filename);

        Article::create([
            'nom' => $request->nom,
            'categorie' => $request->categorie,
            'prix' => $request->prix,
            'quantite' => $request->quantite,
            'photo' => $filename,
            'description' => $request->description,
            'taille' => $request->taille,
            'date_ajout' => $request->date_ajout,
            'type_article_id' => $request->type_article_id,
            'detail_article_id' => $request->detail_article_id
        ]);
        toastify()->success('article  ajouté ✔');

        return redirect()->route('admin.addarticle')->with('success', 'article  ajouté');
    }
    //ajoute details article
    public function store(Request $request)
    {
        $request->validate([
            'couleur' => 'string',
        ]);

        DetailArticle::create([
            'couleur' => $request->couleur,
        ]);
        toastify()->success('details article  ajouté ✔');

        return redirect()->route('admin.addarticle')->with('success', 'details article  ajouté');
    }
    //modification
    public function updateArticle(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string',
            'categorie' => 'required|in:homme,femme',
            'prix' => 'required|integer|min:0',
            'quantite' => 'required|integer|min:0',
            'description' => 'required|string',
            'date_ajout' => 'required|date',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg',
            'taille' => 'required|string',
            'type_article' => 'required|string',
            'detail_article' => 'required|string',
        ]);

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

        // Mise à jour des champs
        $article->update([
            'nom' => $request->nom,
            'categorie' => $request->categorie,
            'prix' => $request->prix,
            'quantite' => $request->quantite,
            'description' => $request->description,
            'date_ajout' => $request->date_ajout,
        ]);

        // Mettre à jour le type d'article
        $type = TypeArticle::firstOrCreate(['nom' => $request->type_article]);
        $article->type_article_id = $type->id;

        // Mettre à jour le détail de l'article
        $detail = DetailArticle::firstOrCreate(['couleur' => $request->detail_article]);
        $article->detail_article_id = $detail->id;

        $article->save();

        toastify()->success('Article mis à jour avec succès ✔');
        return redirect()->route('admin.listearticle')->with('success', 'Article mis à jour avec succès');
    }
    //suppresion
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->back()->with('success', 'Article supprimé avec succès.');
    }
    //ajout stock
    public function ajouterStock(Request $request, $article_id)
    {
        $request->validate([
            'quantite' => 'required|integer|min:0',
            'date_stock' => 'required|date',
            'article_id' => 'required|exists:articles,id'
        ]);

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
    //methode paiement
        public function methodePaiement(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
            'telephone' =>'required|string',
            'photo' =>'required|image|mimes:jpeg,png,jpg'
        ]);
        $filename = time() . '.' . $request->photo->getClientOriginalExtension();
        $request->photo->move(public_path("assets/upload"), $filename);

        MethodePaiement::create([
            'type' => $request->type,
            'telephone'=>$request->telephone,
            'photo' => $filename,
        ]);
        toastify()->success('methode paiement ajouté ✔');

        return redirect()->route('add.payement')->with('success', 'methode paiement ajouté');
    }
    //update profil
    public function update(Request $request, $id)
{
    $request->validate([
        'nom' => 'required|string',
        'prenom' => 'required|string',
        'adresse' => 'required|string',
        'telephone' => 'required|string',
        'email' => 'required|email',
        'password' => 'nullable|string|min:6',
    ]);

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
            'password.required' => 'le mot de passe est obligatoire',
            'password.min' => 'le mot de passe doit contenir au moins 6 caracteres',
            'password.confirmed' => 'le mot de passe ne correspondent pas',
        ];
    }
    //deconnexion
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('page.admin');
    }
}
