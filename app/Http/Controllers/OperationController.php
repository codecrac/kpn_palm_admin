<?php

namespace App\Http\Controllers;

use App\Models\Operation;
use App\Models\Producteur;
use Illuminate\Http\Request;

class OperationController extends Controller
{
    #=========FRONT
    public function nouvelle_operation(){
        $les_producteurs = Producteur::all();
        return view('operations.nouveau',compact('les_producteurs'));
    }

    public function liste_operations(){
        $les_operations = Operation::all();
        return view('operations.liste',compact('les_operations'));
    }

    public function editer_operation($id_operation){
        $loperation = Operation::findorfail($id_operation);
        return view('operations.editer',compact('id_operation','loperation'));
    }


    public function enregistrer_operation(Request $request){
        $df = $request->all();
        $le_producteur = new Operation();
        $le_producteur->id_producteur = $df['id_producteur'];
        $le_producteur->titre = $df['titre'];
        $le_producteur->description = $df['description'];
        $le_producteur->cash = $df['cash'];
        $le_producteur->statut = $df['statut'];
        $le_producteur->temps_depart = date('d-m-Y',strtotime($df['date_depart'])) . ' à '.$df['heure_depart'];
        $le_producteur->temps_arriver = date('d-m-Y',strtotime($df['date_arriver'])) . ' à '.$df['heure_arriver'];
        $le_producteur->maluces = $df['maluce'];
        $le_producteur->commentaire = $df['commentaire'];

        $notif = "<div class='alert alert-danger text-center'> Echec, Quelque Chose s'est mal passé </div>";
        if($le_producteur->save()){
            $notif = "<div class='alert alert-success text-center'> Operation effectuée avec succès </div>";
        }
        return redirect()->back()->with('notif',$notif);
    }
}
