<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    //
    public function index(){

        /* Si l'utilisateur n'est pas authentifié affiche l'erreur 403 */
        if (! Gate::allows('access-admin')) {
            abort(403);
    }

        return view('dashboard');
    }
}
