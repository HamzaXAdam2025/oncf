<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voyage extends Model
{
    use HasFactory;

    public function commandes()
    {
        return $this->belongsToMany(Commande::class, 'billets', 'id_voyage', 'id_commande')
            ->withPivot('qte'); // Ajoutez d'autres colonnes pivot si nécessaire
    }
}
