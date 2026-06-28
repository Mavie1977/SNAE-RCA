<?php
namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Paiement;
use App\Models\ManagerIndicateur;

class ManagerDashboardController extends Controller
{
    public function index()
    {
        return view('manager.dashboard', [
            'paiements' => Paiement::count(),
            'recettes' => Paiement::where('statut', 'paye')->sum('montant')
        ]);
    }

    public function stats()
    {
        return view('manager.statistiques', ['indicateurs' => ManagerIndicateur::latest()->paginate(20)]);
    }
}
