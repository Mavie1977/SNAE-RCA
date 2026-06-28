<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Paiement extends Model
{
    protected $fillable=['demande_id','citoyen_id','montant','moyen_paiement','reference_transaction','statut','date_paiement'];
}
