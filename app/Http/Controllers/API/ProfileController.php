<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Http\Resources\ProfileResource;
use App\Models\Profiles;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    protected const KEY  = 'profiles_api' ;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()  
    { 
        // Profiles::withTrashed()->get()
        // if(Cache::has('profiles_api')) {
        //     $profiles = Cache::get('profiles_api') ; 
        // }else {
        //     $profiles = ProfileResource::collection(Profiles::all()) ; 
        // }
        Cache::delete(self::KEY) ;
        DB::table('profiles')->where('id','<',10)->dd() ; // get=> afficher items , fisrt => affihcer element 1  , value => afficher les element spécifique 
        $profiles = Cache::remember(self::KEY,14400,function(){
            return ProfileResource::collection(Profiles::all()) ; 
        }) ; 
        return $profiles;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formField = $request->all() ; 
        $formField['password'] = Hash::make($request->password) ;   
        $profile = Profiles::create($formField) ;
        Cache::forget(self::KEY) ; 
        return  new ProfileResource($profile);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profiles  $profiles
     * @return \Illuminate\Http\Response
     */
    public function show(Profiles $profile)
    {
       return  new ProfileResource($profile) ; 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profiles  $profiles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profiles $profile)
    { 
        $formField =  $request->all();
        $formField['password'] = Hash::make($formField['password']);
        $profile->fill($formField)->save();
        Cache::forget(self::KEY) ; 
        return  new ProfileResource($profile);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profiles  $profiles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profiles $profile)
    {
        $profile->delete();
        Cache::forget(self::KEY) ; 
        
        return response()->json([
            "message"=>'le profile est bien supprimé',
            "id"=> $profile->id ,
            "errors"=>[] 
        ]);
    }
}
