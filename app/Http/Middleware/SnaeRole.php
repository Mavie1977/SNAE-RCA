<?php
namespace App\Http\Middleware;
use Closure; use Illuminate\Http\Request;
class SnaeRole{public function handle(Request $r,Closure $n,string $role){if($r->session()->get('role')!==$role){return match($r->session()->get('role')){'admin'=>redirect()->route('admin.dashboard'),'agent_public'=>redirect()->route('agent.dashboard'),'citoyen'=>redirect()->route('citoyen.dashboard'),default=>redirect()->route('login')};}return $n($r);}}
