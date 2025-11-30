<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use App\Models\Profiles;
use Illuminate\Support\Facades\Hash;

class profileController extends Controller
{
    public function index() {
        $profiles = Profiles::paginate(9) ;
        return view('profiles.index',compact('profiles')) ; 
    }
    public function show(Profiles $profiles){
        // $id = (int)$req->id ; 
        // $profiles = Profiles::find($id) ; 
        return view('profiles.show',compact('profiles')) ; 
    }
    public function create() {
        return view('profiles.create') ; 
    }
    public function store(ProfileRequest $req) {
        // * prendre les valoures 
    //    $name = $req->name ; 
    //    $email = $req->email ; 
    //    $pass = $req->pass ; 
    //    $bio = $req->bio ; 
    // ~ Validation Simple 
    /* 
    $formField = $req->validate([
        'name'=>'required|between:4,15',
        'email'=>'email|required|unique:profiles' ,
        'passwrd'=>'required|min:8|max:32|confirmed',
        'bio'=>'required'
        ]) ;
     */ 
    $formField = $req->validated() ; 
    // dd($formField) ; 
    // ! pour changée le façon d'ecrire le mot de pass sur database = cribtage
    $formField['password'] = Hash::make($formField['password']) ; 
    $formField['image'] = $req->file('image')->store('profile','public') ;  
    // insertion 
    Profiles::create($formField) ; 
    return redirect()->route('profiles.index')->with('success','Votre Compte Est Bien Crée.') ; 
    }
    public function destroy(Profiles $profiles){
        $profiles->delete();
        return to_route('profiles.index')->with('success',"le profile bien suprimer") ; 
    }
    public function edit(Profiles $profile) {
        return view('profiles.edit',compact('profile')) ; 
    }
    public function update (ProfileRequest $req,Profiles $profile) {
        $formField = $req->validated() ; 
        $profile->fill($formField)->save(); 
        return to_route('profile.update',$profile->id)->with('success','le profile à bien ètè modifier') ; 
    }
}
