<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommandeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Créer des commandes pour des utilisateurs aléatoires
         User::all()->each(function ($user) {
            $user->commandes()->create([
                'datecommande' => now()->toDateString(),
            ]);
        });
    }
}
