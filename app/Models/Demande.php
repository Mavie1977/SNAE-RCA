<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Demande extends Model{protected $fillable=['citoyen_id','service_public_id','numero_dossier','objet','description','statut','etape_workflow']; public function citoyen(){return $this->belongsTo(Citoyen::class);} public function servicePublic(){return $this->belongsTo(ServicePublic::class);}}
