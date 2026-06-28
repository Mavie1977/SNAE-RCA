<?php
namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\Demarche;

class DemarcheController extends Controller
{
    public function show(Demarche $demarche)
    {
        return view('portal.demarche-show', ['demarche' => $demarche]);
    }

    public function store(Demarche $demarche)
    {
        return redirect()->route('payments.pay', ['demande' => 1]);
    }
}
