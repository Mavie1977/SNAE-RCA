<?php
namespace App\Http\Middleware;
use Closure; use Illuminate\Http\Request;
class SnaeAuth{public function handle(Request $r,Closure $n){return $r->session()->has('user_id')?$n($r):redirect()->route('login');}}
