<?php
namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\Theme;

class ThemeController extends Controller
{
    public function index()
    {
        return view('portal.themes', ['themes' => Theme::withCount('demarches')->get()]);
    }

    public function show(Theme $theme)
    {
        return view('portal.theme-show', ['theme' => $theme->load('demarches')]);
    }
}
