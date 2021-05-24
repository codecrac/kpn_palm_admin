<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function nouvelle_information(){
        return view('informations.nouveau');
    }

    public function liste_informations(){
        $les_informations = Information::all();
        return view('informations.liste',compact('les_informations'));
    }


    public function enregistrer_information(Request $request){
        $df = $request->all();
        $linformation = new Information();
        $linformation->id_producteur = '0';
        $linformation->titre = $df['titre'];
        $linformation->description = $df['description'];
        $linformation->timestamp = date('d-m-Y');

        $notif = "<div class='alert alert-danger text-center'> Echec, Quelque Chose s'est mal passé </div>";
        if($linformation->save()){
            $notif = "<div class='alert alert-success text-center'> Operation effectuée avec succès </div>";
        }
        return redirect()->back()->with('notif',$notif);
    }

    public function supprimer_information($id_producteur){
        $linformation = Information::findorfail($id_producteur);

        $notif = "<div class='alert alert-danger text-center'> Echec, Quelque Chose s'est mal passé </div>";
        if($linformation->delete()){
            $notif = "<div class='alert alert-success text-center'> Operation effectuée avec succès </div>";
        }
        return redirect()->route('liste_operations')->with('notif',$notif);
    }

}
