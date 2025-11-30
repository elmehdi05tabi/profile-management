<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController ;
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

Route::get('/',[homeController::class,'index'])->name('home');
Route::get('/login',[LoginController::class,'show'])->name('login.show') ; 
Route::post('/login',[LoginController::class,'login'])->name('login') ; 
Route::get('/logout',[LoginController::class,'logout'])->name('login.logout') ; 
Route::get('/profiles',[profileController::class,'index'])->name('profiles.index') ; 
Route::get('/profiles/{profiles}',[profileController::class,'show'])
->where('profiles','\d+')
->name('profile.show'); 
Route::get('/settings',[settingController::class,'index'])->name('settings.index'); 
Route::get('/profiles/create',[profileController::class,'create'])->name('create'); 
Route::post('profiles/store',[profileController::class,'store'])->name('store'); 
Route::delete('profiles/{profiles}',[profileController::class,'destroy'])
->name('profile.destroy') ;
Route::get('profiles/{profile}/edit',[profileController::class,'edit'])->name('profile.edit') ; 
Route::put('profiles/{profile}',[profileController::class,'update'])->name('profile.update') ; 
// Route::get('/salam/{nom}/{prenom}',function (Request $request){
//     return view('/salam',[
//         'nom'=> $request->route('nom'),
//         'prenom'=> $request->route('prenom')
//     ]); 
// }) ;