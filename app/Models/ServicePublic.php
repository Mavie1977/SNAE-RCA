<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class ServicePublic extends Model{protected $table='services_publics'; protected $fillable=['ministere_id','service_interne_id','nom','description','delai_traitement','cout']; public function ministere(){return $this->belongsTo(Ministere::class);}}
