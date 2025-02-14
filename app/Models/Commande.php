<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'id_client');
    }

    public function voyages()
    {
        return $this->belongsToMany(Voyage::class, 'billets', 'id_voyage', 'id_commande')
            ->withPivot('qte'); // Ajoutez d'autres colonnes pivot si nécessaire
    }
}
