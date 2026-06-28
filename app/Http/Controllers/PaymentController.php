<?php
namespace App\Http\Controllers;

use App\Models\Paiement;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function pay($demande)
    {
        return view('payments.pay', ['demandeId' => $demande]);
    }

    public function store(Request $request, $demande)
    {
        $paiement = Paiement::create([
            'demande_id' => $demande,
            'montant' => $request->montant ?? 0,
            'moyen_paiement' => $request->moyen_paiement,
            'reference_transaction' => 'PAY-' . strtoupper(Str::random(10)),
            'statut' => 'paye',
            'date_paiement' => now(),
        ]);

        return redirect()->route('payments.receipt', $paiement);
    }

    public function receipt(Paiement $paiement)
    {
        return view('payments.receipt', ['paiement' => $paiement]);
    }
}
