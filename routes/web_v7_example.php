<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Portal\PortalController;
use App\Http\Controllers\Portal\ThemeController;
use App\Http\Controllers\Portal\DemarcheController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Manager\ManagerDashboardController;

Route::get('/', [PortalController::class, 'index'])->name('portal.home');
Route::get('/themes', [ThemeController::class, 'index'])->name('themes.index');
Route::get('/themes/{theme}', [ThemeController::class, 'show'])->name('themes.show');
Route::get('/demarches/{demarche}', [DemarcheController::class, 'show'])->name('demarches.show');

Route::middleware(['snae.auth'])->group(function () {
    Route::post('/demarches/{demarche}/demande', [DemarcheController::class, 'store'])->name('demarches.store');

    Route::get('/paiements/{demande}/payer', [PaymentController::class, 'pay'])->name('payments.pay');
    Route::post('/paiements/{demande}', [PaymentController::class, 'store'])->name('payments.store');
    Route::get('/paiements/{paiement}/recu', [PaymentController::class, 'receipt'])->name('payments.receipt');

    Route::prefix('manager')->name('manager.')->group(function () {
        Route::get('/dashboard', [ManagerDashboardController::class, 'index'])->name('dashboard');
        Route::get('/statistiques', [ManagerDashboardController::class, 'stats'])->name('stats');
    });
});
