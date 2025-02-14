<?php

namespace App\Http\Controllers;

use App\Models\Voyage;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;

class TrajetController extends Controller
{
    //

    public function afficherFormulaireRecherche()
    {
        $villesDepart = Voyage::distinct()->pluck('ville_depart');
        $villesDarriv = Voyage::distinct()->pluck('ville_arrivee');
        return view('Rechercher', ['villesDepart' => $villesDepart, 'villesArrivee' => $villesDarriv]);
    }

    public function rechercherVoyages(Request $request)
    {
        //session()->flush();



        $villesDepart = Voyage::distinct()->pluck('ville_depart');
        $villesDarriv = Voyage::distinct()->pluck('ville_arrivee');


        // Récupérer les données de la requête
        $vd = $request->input('ville_depart');
        $va = $request->input('ville_arrivee');

        // Effectuer la recherche des voyages correspondants
        $voyages = Voyage::where('ville_depart', $vd)->where('ville_arrivee', $va)->get();

        // Retourner la vue avec les résultats de la recherche
        return view('Rechercher', ['voyages' => $voyages, 'villesDepart' => $villesDepart, 'villesArrivee' => $villesDarriv, 'vd' => $vd, 'va' => $va]);
    }
}
