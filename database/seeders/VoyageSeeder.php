<?php

namespace Database\Seeders;

use App\Models\Voyage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VoyageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Créer quatre voyages fictifs
        Voyage::create([
            'Code_Voyage' => 'ABC123',
            'Ville_Depart' => 'Paris',
            'Ville_Arrivee' => 'New York',
            'Heure_Depart' => '08:00:00',
            'Heure_Arrivee' => '12:00:00',
            'Prix' => 500.00,
        ]);

        Voyage::create([
            'Code_Voyage' => 'DEF456',
            'Ville_Depart' => 'New York',
            'Ville_Arrivee' => 'Los Angeles',
            'Heure_Depart' => '10:00:00',
            'Heure_Arrivee' => '14:00:00',
            'Prix' => 600.00,
        ]);

        Voyage::create([
            'Code_Voyage' => 'GHI789',
            'Ville_Depart' => 'Los Angeles',
            'Ville_Arrivee' => 'Tokyo',
            'Heure_Depart' => '12:00:00',
            'Heure_Arrivee' => '18:00:00',
            'Prix' => 800.00,
        ]);

        Voyage::create([
            'Code_Voyage' => 'JKL012',
            'Ville_Depart' => 'Tokyo',
            'Ville_Arrivee' => 'Sydney',
            'Heure_Depart' => '14:00:00',
            'Heure_Arrivee' => '20:00:00',
            'Prix' => 700.00,
        ]);
    }
}
