<?php

namespace App\Http\Controllers;

use App\Models\Actu;
use App\Models\Semaine;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //
    public function index(){

        $actus = Actu::All();/* Récupère les informations du model */
        $semaines = Semaine::all();
        return view('/public/index' , compact('actus' , "semaines"));
    }


}
