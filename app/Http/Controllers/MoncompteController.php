<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MoncompteController extends Controller
{
    //
    /* Point d'entrée(constructeur) de ma classe */
    public function __construct(){
        
        /* Sécurise toutes les pages de mon middleware */
       /*  $this->middleware('auth');
     */

        /* Sécurité avec une exception */
        /* $this->middleware('auth')->except(['panier']); */
    }

    public function index(){

        return view('/moncompte');
    }

    public function panier(){

        return view('/panier');
    }
}
