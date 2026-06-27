<?php
namespace App\Http\Controllers;
use App\Models\Citoyen;use App\Models\Ministere;use App\Models\ServicePublic;use App\Models\Demande;use App\Models\User;
class AdminController extends Controller{
public function dashboard(){return view('admin.dashboard',['citoyensCount'=>Citoyen::count(),'ministeresCount'=>Ministere::count(),'servicesCount'=>ServicePublic::count(),'demandesCount'=>Demande::count()]);}
public function ministeres(){return view('admin.ministeres',['ministeres'=>Ministere::withCount('servicesPublics')->paginate(20)]);}
public function services(){return view('admin.services',['services'=>ServicePublic::with('ministere')->paginate(30)]);}
public function demandes(){return view('admin.demandes',['demandes'=>Demande::with('citoyen','servicePublic.ministere')->latest()->paginate(20)]);}
public function utilisateurs(){return view('admin.utilisateurs',['users'=>User::paginate(30)]);}}
