<?php
namespace App\Http\Controllers;
use App\Models\Citoyen;use App\Models\ServicePublic;use App\Models\Demande;use Illuminate\Http\Request;
class CitoyenController extends Controller{private function c(){return Citoyen::where('user_id',session('user_id'))->firstOrFail();}
public function dashboard(){$c=$this->c();return view('citoyen.dashboard',['citoyen'=>$c,'demandesCount'=>$c->demandes()->count(),'traiteesCount'=>$c->demandes()->where('statut','Traitée')->count()]);}
public function demandes(){return view('citoyen.demandes',['demandes'=>Demande::with('servicePublic.ministere')->where('citoyen_id',$this->c()->id)->latest()->paginate(15)]);}
public function create(){return view('citoyen.create',['services'=>ServicePublic::with('ministere')->orderBy('nom')->get()]);}
public function store(Request $r){$d=$r->validate(['service_public_id'=>'required|exists:services_publics,id','objet'=>'required|max:191','description'=>'nullable']);$x=Demande::create(['citoyen_id'=>$this->c()->id,'service_public_id'=>$d['service_public_id'],'numero_dossier'=>'','objet'=>$d['objet'],'description'=>$d['description']??'','statut'=>'En attente','etape_workflow'=>'Dépôt citoyen']);$x->update(['numero_dossier'=>'RCA-'.date('Y').'-'.str_pad($x->id,6,'0',STR_PAD_LEFT)]);return redirect()->route('citoyen.demandes');}
public function profil(){return view('citoyen.profil',['citoyen'=>$this->c()]);}
public function fiche()
{
    return view('citoyen.fiche', [
        'citoyen' => $this->c()
    ]);
}


}
