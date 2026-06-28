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
public function fiche()
{
    $agent = AgentPublic::where('nom', 'like', '%' . session('name') . '%')
        ->orWhere('prenom', 'like', '%' . session('name') . '%')
        ->first();

    return view('agent.fiche', [
        'agent' => $agent
    ]);
}}