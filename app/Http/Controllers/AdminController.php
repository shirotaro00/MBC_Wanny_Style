<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Categorie;
use App\Models\TypeArticle;
use Illuminate\Http\Request;
use App\Models\DetailArticle;
use App\Models\ArticleCategorie;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    //page login admin
    public function admin(){
        return view('pageadmin.login.loginadmin');
    }
//accueil dashboard
    public function accueil(){
        return view('pageadmin.dashbord.dashboard');
    }
//creation login & register
    public function LoginForm(){
    return view("pageadmin.login.loginadmin");
    }

    public function dashbordadmin() {
      return view("pageadmin.dashbord.dashboard");
    }

    //page modification
    public function editarticle(){
      return view("pageadmin.dashbord.nodificationarticle");
    }


    //page stock
    public function stockarticle(){
        $details = DetailArticle::all();
        $articles = Article::all();
        $details = DetailArticle::with('stock','article')->get();
      return view("pageadmin.dashbord.stock",compact("details"));
    }

    //page profil
    public function profil(){
      $admin = Auth::user();
    return view('pageadmin.dashbord.profil', compact('admin'));
    }


//page liste article
    public function listearticle() {
    $articleCategories = ArticleCategorie::with([
        'article.detailArticle',
        'typeArticle.categorie'
    ])->get();

      return view("pageadmin.dashbord.listearticle", compact('articleCategories'));
    }


//page ajout article
     public function addarticle() {
        $types = TypeArticle::all();
        $articles = Article::all();
        $categories = Categorie::all();
      return view("pageadmin.dashbord.Addarticle",compact("types","articles","categories"));
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



    $admin =User::create([
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

    return redirect()->route('admin.accueil')->with('success', 'Compte client créé');

}
//connexion admin
    public function login(Request $request){

        $credentials = $request->validate([
            "email"=>["required","email"],
            "password"=>["required"]

        ]);

            if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->role == 0) {
                 return redirect()->route('admin.accueil');
            }
            }
            else {
                return redirect()->back()->with("error", "email ou mot de passe incorrect");
            }
     }
    //ajout categorie
    public function addcat(Request $request){

         $request->validate([
        'nom' => 'required|string',
    ]);

    Categorie::create([
        'nom' => $request->nom,
    ]);
    toastify()->success('categorie ajouté ✔');

    return redirect()->route('admin.addarticle')->with('success', 'Compte client créé');

}
//ajout type article
    public function addType(Request $request){

         $request->validate([
        'nom' => 'required|string',
        'categorie_id' => 'required|exists:categories,id'
    ]);

    TypeArticle::create([
        'nom' => $request->nom,
        'categorie_id' => $request->categorie_id
    ]);
    toastify()->success('Type article  ajouté ✔');

    return redirect()->route('admin.addarticle')->with('success', 'Compte client créé');

}
//ajout type articleCategorie
    public function artCat(Request $request){

         $request->validate([
        'article_id' => 'required|exists:articles,id',
        'type_article_id' => 'required|exists:type_articles,id'
    ]);

    ArticleCategorie::create([
        'article_id' => $request->article_id,
        'type_article_id' => $request->type_article_id
    ]);
    toastify()->success('article categorie  ajouté ✔');

    return redirect()->route('admin.addarticle')->with('success', 'Compte client créé');

}
//ajout article
    public function ajoutArticle(Request $request){

         $request->validate([
        'nom' => 'required|string',
        'prix' => 'required|integer|min:0',
        'photo' => 'required|image|mimes:jpeg,png,jpg',
        'type_article_id' => 'required|exists:type_articles,id'
    ]);
    $filename = time() . '.' . $request->photo->getClientOriginalExtension();
    $request->photo->move(public_path("assets/upload"), $filename);

    Article::create([
        'nom' => $request->nom,
        'prix' => $request->prix,
        'photo'=> $filename,
        'type_article_id' => $request->type_article_id
    ]);
    toastify()->success('article  ajouté ✔');

    return redirect()->route('admin.addarticle')->with('success', 'Compte client créé');

}
//ajoute details article
public function store(Request $request)
{
    $request->validate([
        'taille' => 'required|string',
        'couleur' => 'required|string',
        'description' => 'required|string',
        'article_id' => 'required|exists:articles,id',
    ]);

    DetailArticle::create([
        'taille' => $request->taille,
        'couleur' => $request->couleur,
        'description' => $request->description,
        'article_id' => $request->article_id,
    ]);
    toastify()->success('details article  ajouté ✔');

    return redirect()->route('admin.addarticle')->with('success', 'Compte client créé');
}
//ajoute stock
public function ajouterStock(Request $request, $detail_article_id)
{
    $request->validate([
        'quantite' => 'required|integer|min:1',
        'detail_article_id'=>'required|exists:detail_articles,id',
        'article_id' => 'required|exists:articles,id',
    ]);

    $stock = Stock::where('detail_article_id', $detail_article_id)->first();

    if ($stock) {
        $stock->quantite += $request->quantite;
        $stock->save();
    } else {
        Stock::create([
            'detail_article_id' => $detail_article_id,
            'article_id' => $article_id,
            'quantite' => $request->quantite,
        ]);
    }
toastify()->success('Stock ajouté avec succès ✔');

    return back()->with('success', 'Stock ajouté avec succès.');
}
//message d'erreur password
    public function messages(){
        return [
            'password.required'=>'le mot de passe est obligatoire',
            'password.min'=>'le mot de passe doit contenir au moins 6 caracteres',
            'password.confirmed'=>'le mot de passe ne correspondent pas',
        ];
     }
//deconnexion
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('page.admin');
    }
}
