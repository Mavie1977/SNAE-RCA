<?php
namespace App\Http\Controllers;
use App\Models\Citoyen;use App\Models\AgentPublic;use App\Models\Demande;use App\Models\ServicePublic;use Illuminate\Http\Request;
class SearchController extends Controller{public function index(Request $r){$q=trim((string)$r->query('q'));
$citoyens=$agents=$demandes=$services=collect();if($q!==''){$citoyens=Citoyen::where('nni','like',"%$q%")->orWhere('nom','like',"%$q%")->orWhere('prenom','like',"%$q%")->limit(10)->get();
$agents=AgentPublic::where('matricule','like',"%$q%")->orWhere('nom','like',"%$q%")->orWhere('ministere','like',"%$q%")->limit(10)->get();
$demandes = Demande::where('numero_dossier', 'like', "%$q%")
    ->orWhere('objet', 'like', "%$q%")
    ->orWhere('description', 'like', "%$q%")
    ->orWhereHas('citoyen', function ($query) use ($q) {
        $query->where('nom', 'like', "%$q%")
              ->orWhere('prenom', 'like', "%$q%")
              ->orWhere('nni', 'like', "%$q%");
    })
    ->limit(10)
    ->get();
$services=ServicePublic::with('ministere')->where('nom','like',"%$q%")->limit(10)->get();}return view('search.results',compact('q','citoyens','agents','demandes','services'));}}
