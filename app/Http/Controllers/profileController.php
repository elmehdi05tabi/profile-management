<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use App\Models\Profiles;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

class profileController extends Controller
{
    public function index() 
    {
        // $profiles = Profiles::paginate(9);
        $profiles = Cache::remember('profiles',30,function(){
            return Profiles::paginate(9) ; 
        });
        return view('profiles.index', compact('profiles'));
    }
    public function show(string $id)
    {
        $profilePrefix = 'profile_'.$id ; 
        // if(Cache::has($profilePrefix)) {
        //     $profile = Cache::get($profilePrefix) ;
        // }else {
        //     $profile  = Profiles::findOrFail($id) ; 
        //     Cache::put($profilePrefix,$profile,240) ;
        // }; 
        // !"👇";
        $profile = Cache::remember($profilePrefix,10,function() use ($id){
            return Profiles::findOrFail($id) ;
        });
        return view('profiles.show', compact('profile'));
    }
    public function create()
    {
        return view('profiles.create');
    }
    public function store(ProfileRequest $req)
    {
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
        $formField = $req->validated();
        // dd($formField) ; 
        // ! pour changée le façon d'ecrire le mot de pass sur database = cribtage
        $formField['password'] = Hash::make($formField['password']);
        if ($req->hasFile('image') != NULL) {
            $formField['image'] = $req->file('image')->store('profile', 'public');
        } else {
            $formField['image'] = "profile/profile.png";
        }
        // insertion 
        Profiles::create($formField);
        return redirect()->route('profiles.index')->with('success', 'Votre Compte Est Bien Crée.');
    }
    public function destroy(Profiles $profile)
    {
        $profile->delete();
        return to_route('profiles.index')->with('success', "le profile bien suprimer");
    }
    public function edit(Profiles $profile)
    {
        return view('profiles.edit', compact('profile'));
    }
    public function update(ProfileRequest $req, Profiles $profile)
    {
        $formField = $req->validated();
        $formField['password'] = Hash::make($formField['password']);
        if ($req->hasFile('image')) {
            $formField['image'] = $req->file('image')->store('profile', 'public');
        }
        $profile->fill($formField)->save();
        return to_route('profiles.update', $profile->id)->with('success', 'le profile à bien ètè modifier');
    }
}
