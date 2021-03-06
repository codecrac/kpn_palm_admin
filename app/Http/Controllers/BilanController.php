<?php

namespace App\Http\Controllers;

use App\Models\Operation;
use App\Models\Producteur;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class BilanController extends Controller
{

    public function choisir_configuration_bilan(){
        $les_producteurs = Producteur::all();
        return view('bilan.choisir_configuration_bilan',compact('les_producteurs'));
    }

    public function bilan_periodique(Request $request){
        $df = $request->all();
//        dd($df,isset($df['voir_bilan']));
        $id_producteur = $df['id_producteur'];
        $date_debut = $df['date_debut'];
        $date_fin = $df['date_fin'];

        if($id_producteur==0){
            $les_operations = Operation::where('created_at','>=',$date_debut)->where('created_at','<=',$date_fin)->get();
            $nom_producteur = '';
        }else{
            $les_operations = Operation::where('id_producteur','=',$id_producteur)->where('created_at','>=',$date_debut)->where('created_at','<=',$date_fin)->get();
            $le_producteur = Producteur::findorfail($id_producteur);
            $nom_producteur = "de ". $le_producteur->nom;
        }

        if(isset($df['voir_bilan'])) {
            return view('bilan.bilan_periode', compact('les_operations', 'date_debut', 'date_fin', 'nom_producteur'));
        }else{
            $domPdf = new Dompdf();
            $domPdf->loadHtml(view('bilan.bilan_periode_pdf',compact('les_operations','date_debut','date_fin','nom_producteur')));

            $domPdf->setPaper('A4');

            //convertir en pdf
            $domPdf->render();

            //afficher le pdf
            $nom_facture = 'Bilan-'.$date_debut.'-'.$date_fin.'.pdf';
            $domPdf->stream($nom_facture,['Attachment'=>false]);


        }
    }
}
