<?php
namespace App\Http\Controllers ;

use App\Models\Publication;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(Request $req) {
        return view('home') ;
    }
}
