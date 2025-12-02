<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\settingController;

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