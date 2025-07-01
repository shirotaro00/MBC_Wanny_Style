<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function admin(){
        return view('pageadmin.login.loginadmin');
    }

    public function accueil(){
        return view('pageadmin.dashbord.dashboard');
    }

    public function LoginForm(){
    return view("pageadmin.login.loginadmin");
    }

    public function dashbordadmin() {
      return view("pageadmin.dashbord.dashboard");
    }

     public function addarticle() {
      return view("pageadmin.dashbord.Addarticle");
    }


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

    User::create([
        'nom' => $request->nom,
        'prenom' => $request->prenom,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'adresse' => $request->adresse,
        'telephone' => $request->telephone,
        'role' => '0',
    ]);
    toastify()->success('Votre compte été créer avec succès ✔');

    return redirect()->route('admin.accueil')->with('success', 'Compte client créé');

}

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

    public function messages(){
        return [
            'password.required'=>'le mot de passe est obligatoire',
            'password.min'=>'le mot de passe doit contenir au moins 6 caracteres',
            'password.confirmed'=>'le mot de passe ne correspondent pas',
        ];
     }

}
