<?php
namespace App\Http\Controllers; use App\Models\Ministere; use App\Models\ServicePublic; class HomeController extends Controller{public function index(){return view('welcome',['ministeresCount'=>Ministere::count(),'servicesCount'=>ServicePublic::count()]);}}
