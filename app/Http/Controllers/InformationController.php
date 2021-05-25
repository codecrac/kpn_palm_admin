<?php

namespace App\Http\Controllers;

use App\Models\Information;
use App\Models\Producteur;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InformationController extends Controller
{
    public function nouvelle_information(){
        return view('informations.nouveau');
    }

    public function liste_informations($id_producteur=null){
        $les_informations = Information::orderBy('id','DESC')->get();

        $nb_info_non_lu =0;
        if($id_producteur!=null){
            $le_producteur= Producteur::findorfail($id_producteur);
            $le_producteur->info_non_lu = 0;
            $le_producteur->save();


            $le_producteur = \App\Models\Producteur::findorfail($id_producteur);
            $nb_info_non_lu = $le_producteur->info_non_lu;
        }

        return view('informations.liste',compact('les_informations','id_producteur','nb_info_non_lu'));
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

        Producteur::where('op_non_lu','=','0')
            ->update([
                'info_non_lu'=> DB::raw('info_non_lu+1')
            ]);
        return redirect()->back()->with('notif',$notif);
    }

    public function supprimer_information($id_producteur){
        $linformation = Information::findorfail($id_producteur);

        $notif = "<div class='alert alert-danger text-center'> Echec, Quelque Chose s'est mal passé </div>";
        if($linformation->delete()){
            $notif = "<div class='alert alert-success text-center'> Operation effectuée avec succès </div>";
        }
        return redirect()->route('liste_informations')->with('notif',$notif);
    }

}
