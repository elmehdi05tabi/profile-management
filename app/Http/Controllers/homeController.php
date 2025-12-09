<?php
namespace App\Http\Controllers ;

use App\Mail\ProfileMail;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class homeController extends Controller
{
    public function index(Request $req) {
        $c = $req->session()->get('compteur',0) ; 
        $req->session()->put('compteur',$c+1) ; 
        $c = $req->session()->increment('c') ; 
        Mail::to('elmehditabi0@gmail.com')->send(new profileMail()) ; 
        return view('mailes.inscription',compact('c')) ;
    }
}
