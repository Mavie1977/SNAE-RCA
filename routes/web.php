<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CitoyenController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\SearchController;

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/login',[AuthController::class,'showLogin'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('login.post');
Route::get('/register',[AuthController::class,'showRegister'])->name('register');
Route::post('/register',[AuthController::class,'register'])->name('register.post');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');

Route::middleware(['snae.auth'])->group(function(){
    Route::get('/search',[SearchController::class,'index'])->name('search');
    Route::prefix('admin')->middleware(['snae.role:admin'])->name('admin.')->group(function(){
        Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
        Route::get('/ministeres',[AdminController::class,'ministeres'])->name('ministeres');
        Route::get('/services',[AdminController::class,'services'])->name('services');
        Route::get('/demandes',[AdminController::class,'demandes'])->name('demandes');
        Route::get('/utilisateurs',[AdminController::class,'utilisateurs'])->name('utilisateurs');
    });
    Route::prefix('citoyen')->middleware(['snae.role:citoyen'])->name('citoyen.')->group(function(){
        Route::get('/dashboard',[CitoyenController::class,'dashboard'])->name('dashboard');
        Route::get('/demandes',[CitoyenController::class,'demandes'])->name('demandes');
        Route::get('/demandes/nouvelle',[CitoyenController::class,'create'])->name('demandes.create');
        Route::post('/demandes',[CitoyenController::class,'store'])->name('demandes.store');
        Route::get('/profil',[CitoyenController::class,'profil'])->name('profil');
		Route::get('/fiche', [CitoyenController::class, 'fiche'])->name('fiche');
    });
    Route::prefix('agent')->middleware(['snae.role:agent_public'])->name('agent.')->group(function(){
        Route::get('/dashboard',[AgentController::class,'dashboard'])->name('dashboard');
        Route::get('/demandes',[AgentController::class,'demandes'])->name('demandes');
        Route::post('/demandes/{demande}/statut',[AgentController::class,'statut'])->name('demandes.statut');
        Route::get('/services',[AgentController::class,'services'])->name('services');
		Route::get('/fiche', [CitoyenController::class, 'fiche'])->name('fiche');
    });
});
