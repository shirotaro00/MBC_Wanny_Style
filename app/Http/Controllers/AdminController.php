<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\TypeArticle;
use Illuminate\Http\Request;
use App\Models\DetailArticle;
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

    //page modification
    public function editarticle($id)
    {
        $article = Article::with(['typeArticle', 'detailArticle'])->findOrFail($id);
        return view("pageadmin.dashbord.nodificationarticle", compact("article"));
    }


    //page stock
    public function stockarticle()
    {
        return view("pageadmin.dashbord.stock");
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
    // //ajoute stock
    // public function ajouterStock(Request $request, $detail_article_id)
    // {
    //     $request->validate([
    //         'quantite' => 'required|integer|min:1',
    //         'detail_article_id'=>'required|exists:detail_articles,id',
    //         'article_id' => 'required|exists:articles,id',
    //     ]);

    //     $stock = Stock::where('detail_article_id', $detail_article_id)->first();

    //     if ($stock) {
    //         $stock->quantite += $request->quantite;
    //         $stock->save();
    //     } else {
    //         Stock::create([
    //             'detail_article_id' => $detail_article_id,
    //             'quantite' => $request->quantite,
    //         ]);
    //     }
    // toastify()->success('Stock ajouté avec succès ✔');

    //     return back()->with('success', 'Stock ajouté avec succès.');
    // }
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
