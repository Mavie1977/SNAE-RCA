<?php
namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\Theme;

class PortalController extends Controller
{
    public function index()
    {
        return view('portal.home', ['themes' => Theme::withCount('demarches')->get()]);
    }
}
