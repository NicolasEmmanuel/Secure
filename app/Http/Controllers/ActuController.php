<?php

namespace App\Http\Controllers;

use App\Models\Actu;
use Nette\Utils\Image;
use App\Models\Semaine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActuController extends Controller
{
    //
    public function index(){

        $actus = Actu::All();/* Récupère les informations du model */
        return view('admin.actu-lister' , compact('actus'));
    }

    public function editer(Actu $actu){
        $semaines=Semaine::All();
        return view('admin.actu-editer', compact('actu','semaines') );
    }

    /* Création d'une actu */
    public function create(Request $request){

        
        /* Verification de l'existence du titre */
        $validates=$request->validate([
                                        "titre"=>"required" /* Titre requis */
                                      ]);

                                    $SaveActu = new Actu();/* Creation de l'instence "new actu"  pour l'enregistrement en database*/
                                    $SaveActu->titre = $request->titre;
                                    $SaveActu->description = $request->description;
                                    $SaveActu->semaine_id = $request->semaine_id;
                                    

                                    /* Je controle l'existence de l'image */
                                    if ($request->hasFile("imageActu")){

                                        /* $image=$request->file("imageActu"); *//* recupere les informations de l'image */
        

                                        /* Formatage du nom de l'image */
                                        /* $fileName=time(). "." . $image->getClientOriginalExtension(); */

                                        
                                        $path = Storage::putFile('public', $request->file('imageActu'));/* Ajoute les informations de l'image*/

                                        $SaveActu->image = $path;/* Ajoute l'image en database */
                                        /* dd($path); */
                                       
                                    }

                                    $SaveActu->save();                          
        return back();
    }

    public function update(Request $request , Actu $actu){

        /* Regle de sécurité pour "titre" rendu obligatoire  */
        $validates = $request ->validate([
                                            "titre"=>"required"
                                        ]);

                                        /* Mise a jour des informations */
                                        $actu->update(["titre"=>$request->titre ,
                                                        "description"=>$request->description ,
                                                        "semaine_id"=>$request->semaine_id
                                                      ]);

                            
       
        return back();
    }
  

    public function delete(Actu $actu){
            $actu->delete();
        return back();
    }
    
    
}