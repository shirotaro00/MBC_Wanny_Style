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
        return view('pageadmin.AccueilAdmin');
    }

    public function LoginForm(){
    return view("pageadmin.login.loginadmin");
    }

    public function dashbordadmin() {
      return view("pageadmin.dashbord.dashboard");
    }

    public function registerAdmin(Request $request)
    {
    $request->validate([
        'nom' => 'required|string',
        'prenom' => 'required|string',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        'adresse' => 'required|string',
        'telephone' => 'required|string',
    ]);

    User::create([
        'nom' => $request->nom,
        'prenom' => $request->prenom,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'adresse' => $request->adresse,
        'telephone' => $request->telephone,
        'role' => '0',
    ]);

    return redirect()->route('login')->with('success', 'Compte client créé');
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

}
