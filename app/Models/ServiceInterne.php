<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class ServiceInterne extends Model{protected $table='services_internes'; protected $fillable=['direction_id','ministere_id','nom'];}
