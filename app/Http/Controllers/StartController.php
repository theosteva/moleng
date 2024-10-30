<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StartController extends Controller
{
    public function index(Request $request)
    {
        $role = $request->query('role');
        $selectedLane = $request->query('lane');
        
        $heroes = Hero::when($role, function($query) use ($role) {
            return $query->where(function($q) use ($role) {
                $q->where('role', $role)
                  ->orWhere('second_role', $role);
            });
        })->when($selectedLane, function($query) use ($selectedLane) {
            return $query->where(function($q) use ($selectedLane) {
                $q->where('lane', $selectedLane)
                  ->orWhere('second_lane', $selectedLane);
            });
        })->get();

        $roles = collect(['Tank', 'Fighter', 'Assassin', 'Mage', 'Marksman', 'Support']);
        
        return view('start', compact('heroes', 'roles', 'role', 'selectedLane'));
    }
} 