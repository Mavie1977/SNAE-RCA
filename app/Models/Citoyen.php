<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Citoyen extends Model{protected $fillable=['user_id','nni','nom','prenom','sexe','date_naissance','lieu_naissance','nationalite','telephone','email','adresse','prefecture','commune','profession']; public function demandes(){return $this->hasMany(Demande::class);}}
