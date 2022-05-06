<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Access\Gate;

class UserController extends Controller
{
    //
    public function index(){

        $users = User::all();/* "all()" Retrieves all information from the database  */
       
        
        return view('admin.user' , compact('users')); /* "Compact" :permet de créer un tableau automatiquement en prenant les noms des variables  */
    } 

    public function manageRight(User $user){

/*Afficher $user Metode 1 : 
    -Si $user exite afficher $user
    -Si "user" existe afficher "user" 
    -Sinon j'affiche l'erreur 403  */
                            /* if (isset($user)){  
                                    echo($user);
                            }else{
                                    abort(403); 
                            } */

/*Afficher $user Methode 2 :
    -"FindOrFail" trouve "user" si il existe et affiche une erreur si "user " n'existe pas */
                           /*  $user = User::FindOrFail($id); */

                                    

                            /* echo($user->name); */

/*Changement de l'état administrateur Methode 1: */
                            /* if($user->admin==0){
                                $user->admin=1;
                            }else{
                                $user->admin= 0 ;
                            }
                                
                            $user->update();*/

/*Changement de l'état administrateur methode 2 */
                            $user->admin = !$user->admin;
                            $user->update();

    return back();
}
    
}
