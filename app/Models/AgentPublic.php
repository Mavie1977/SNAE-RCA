<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgentPublic extends Model
{
    protected $table = 'agents_publics';

    protected $fillable = [
        'matricule',
        'nom',
        'prenom',
        'sexe',
        'ministere',
        'direction',
        'service',
        'grade',
        'echelon',
        'date_recrutement',
        'statut',
    ];
}