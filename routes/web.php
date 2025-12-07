<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\settingController;
use App\Services\Calcule;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// ^ les routes pour affichage creation suppression modification sur un profiles utilisateurs 
// Route::name('profile.')->prefix('profiles')->group(function() {
//     Route::controller(profileController::class)->group(function () {
//         Route::get('/','index')->name('index') ; 
//         Route::get('/create','create')->name('create'); 
//         Route::post('/','store')->name('store'); 
//         Route::delete('/{profiles}','destroy')->name('destroy') ;
//         Route::get('/{profile}/edit','edit')->name('edit') ; 
//         Route::put('/{profile}','update')->name('update') ; 
//         Route::get('/{profiles}','show')->where('profiles','\d+')->name('show'); 
//     }) ;
// }) ; 
Route::resource('profiles', profileController::class);
Route::resource('publications',PublicationController::class) ;
Route::get('/', [homeController::class, 'index'])->name('home')->middleware('auth');
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'show'])->name('login.show');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
});
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout')->middleware('auth');
Route::get('/settings', [settingController::class, 'index'])->name('settings.index'); 

// Route::get('/salam/{nom}/{prenom}',function (Request $request){
//     return view('/salam',[
//         'nom'=> $request->route('nom'),
//         'prenom'=> $request->route('prenom')
//     ]); 
// }) ;

















Route::get('/calcule/{a?}/{b?}',function($a,$b,Calcule $calcule){
    // dd(Route::current()) ;
    // dd(Route::currentRouteName()) ; 
    // dd(Route::currentRouteAction()) ; 
    // return redirect()->awat('https/google.com') ;
    return $calcule->somme($a,$b) ;
})->name('google');

Route::view('/form','form');
Route::post('/form',function (Request $request){
    // only => juste les champs qui tu donne en paramétre 
    // except => tous les champs sauf les champ qui donne sur parametre 
    // $request->merge(['input_field'=>date('Y-m-d')])  ; 
    $request->mergeIfMissing(['input_field'=>date('Y-m-d')]);
    dd($request->input('input_field')); 
})->name('form');

Route::get('/salam',function(){
   return response()->download("storage/profile/profile.png") ;
}) ; 


// ! cookie 
Route::get('/get',function(Request $request) {
    return $request->cookie() ;
}) ;

Route::get('/set/{cookie}',function ($cookie){
    $response = new Response() ; 
    $cookieOnject = cookie()->forever('age',$cookie) ;
    return $response->withCookie($cookieOnject) ;
});

Route::get('/header',function(Request $request){
    $response = new Response(['data'=>"ok"]) ; 
    dd($request->header("el","non")) ; 
    return $response->withHeaders([
        'Content-Type'=>'Application/json',
        "x-created-by"=>"El mehdi Tabi"
    ]);
}) ;