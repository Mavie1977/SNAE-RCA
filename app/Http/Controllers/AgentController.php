<?php
namespace App\Http\Controllers;
use App\Models\Demande;use App\Models\ServicePublic;use Illuminate\Http\Request;
class AgentController extends Controller{
public function dashboard(){$m=session('ministere_id');return view('agent.dashboard',['demandesCount'=>Demande::whereHas('servicePublic',fn($q)=>$q->where('ministere_id',$m))->count(),'attenteCount'=>Demande::whereHas('servicePublic',fn($q)=>$q->where('ministere_id',$m))->where('statut','En attente')->count()]);}
public function demandes(){$m=session('ministere_id');return view('agent.demandes',['demandes'=>Demande::with('citoyen','servicePublic')->whereHas('servicePublic',fn($q)=>$q->where('ministere_id',$m))->latest()->paginate(15)]);}
public function statut(Request $r,Demande $demande){$r->validate(['statut'=>'required|in:En attente,En cours,Traitée,Refusée']);if($demande->servicePublic->ministere_id!=session('ministere_id'))abort(403);$demande->update(['statut'=>$r->statut,'etape_workflow'=>'Traitement agent']);return back();}
public function services(){return view('agent.services',['services'=>ServicePublic::where('ministere_id',session('ministere_id'))->paginate(20)]);}}
