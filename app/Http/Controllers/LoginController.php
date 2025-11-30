<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

// use Illuminate\Support\Facades\Request ;

class LoginController extends Controller {
    public function show () {
        return view('login.show') ;
    }
    public function login (Request $req){
        $login = $req->login  ;   
        $password = $req->passwrd  ;   
        $credentials = ['email'=>$login,'password'=>$password] ; 
        if(Auth::attempt($credentials)) {
            // connect
         $req->session()->regenerate() ;  
         return to_route('home')->with('success','Vous étes Bien Connecter '.$login.'!');
        } else {
            return back()->withErrors([
                'login'=>'email ou mot de pass incorrect'
            ])->onlyInput('login');
        };
    }
    public function logout () {
        // !suprimer la session
        Session::flush() ; 
        // ^ déconection
        Auth::logout() ; 
        return to_route('login')->with('success','vous étes bien déconnecter');
    }
}