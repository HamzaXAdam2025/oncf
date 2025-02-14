<?php

namespace Database\Seeders;

use App\Models\Billet;
use App\Models\Commande;
use App\Models\Voyage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BilletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Récupérer toutes les commandes et tous les voyages
        $commandes = Commande::all();
        $voyages = Voyage::all();

        // Pour chaque commande, associez-la à un voyage aléatoire et créez un billet
        $commandes->each(function ($commande) use ($voyages) {
            $voyage = $voyages->random(); // Sélectionnez un voyage aléatoire

            // Générer une quantité aléatoire pour le billet
            $qte = rand(1, 5);

            // Créez le billet pour la commande et le voyage sélectionnés avec la quantité spécifiée
            $billet = new Billet([
                'id_commande' => $commande->id,
                'id_voyage' => $voyage->id,
                'qte' => $qte,
            ]);

            // Enregistrez le billet
            $billet->save();
        });
    }
}
