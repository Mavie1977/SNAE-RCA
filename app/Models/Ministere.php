<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Ministere extends Model{protected $fillable=['nom','description']; public function servicesPublics(){return $this->hasMany(ServicePublic::class);}}
