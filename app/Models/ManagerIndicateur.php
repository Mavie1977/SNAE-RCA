<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class ManagerIndicateur extends Model
{
    protected $table='manager_indicateurs'; protected $fillable=['ministere_id','demandes_recues','demandes_traitees','demandes_retard','recettes','delai_moyen','periode'];
}
