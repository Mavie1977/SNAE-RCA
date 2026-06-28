<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Demarche extends Model
{
    protected $fillable=['theme_id','ministere_id','nom','description','cout','delai_traitement','paiement_obligatoire','active']; public function theme(){return $this->belongsTo(Theme::class);}
}
