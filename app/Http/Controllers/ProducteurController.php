<?php

namespace App\Http\Controllers;

use App\Models\Producteur;
use Illuminate\Http\Request;

class ProducteurController extends Controller
{

    #=========FRONT
    public function nouveau_producteur(){
        return view('producteurs.nouveau');
    }

    public function liste_producteurs(){
        $les_producteurs = Producteur::all();
        return view('producteurs.liste',compact('les_producteurs'));
    }

    public function editer_producteur($id_producteur){
        $le_producteur = Producteur::findorfail($id_producteur);
        return view('producteurs.editer',compact('id_producteur','le_producteur'));
    }

    #===============BACK
    public function enregistrer_producteur(Request $request){
        $df = $request->all();
        $le_producteur = new Producteur();
        $le_producteur->nom = $df['nom'];
        $le_producteur->telephone = $df['telephone'];
        $le_producteur->email = $df['email'];
        $le_producteur->adresse = $df['adresse'];
        $le_producteur->pseudo = $df['pseudo'];
        $le_producteur->mot_de_passe = $df['mot_de_passe'];

        $notif = "<div class='alert alert-danger text-center'> Echec, Quelque Chose s'est mal passé </div>";
        if($le_producteur->save()){
            $notif = "<div class='alert alert-success text-center'> Operation effectuée avec succès </div>";
        }
        return redirect()->back()->with('notif',$notif);
    }

    public function modifier_producteur(Request $request,$id_producteur){
        $df = $request->all();
        $le_producteur = Producteur::findorfail($id_producteur);
        $le_producteur->nom = $df['nom'];
        $le_producteur->telephone = $df['telephone'];
        $le_producteur->email = $df['email'];
        $le_producteur->adresse = $df['adresse'];
        $le_producteur->pseudo = $df['pseudo'];
        $le_producteur->mot_de_passe = $df['mot_de_passe'];

        $notif = "<div class='alert alert-danger text-center'> Echec, Quelque Chose s'est mal passé </div>";
        if($le_producteur->save()){
            $notif = "<div class='alert alert-success text-center'> Operation effectuée avec succès </div>";
        }
        return redirect()->back()->with('notif',$notif);
    }
    public function supprimer_producteur(Request $request,$id_producteur){
        $df = $request->all();
        $le_producteur = Producteur::findorfail($id_producteur);

        $notif = "<div class='alert alert-danger text-center'> Echec, Quelque Chose s'est mal passé </div>";
        if($le_producteur->delete()){
            $notif = "<div class='alert alert-success text-center'> Operation effectuée avec succès </div>";
        }
        return redirect()->route('liste_producteurs')->with('notif',$notif);
    }
}
