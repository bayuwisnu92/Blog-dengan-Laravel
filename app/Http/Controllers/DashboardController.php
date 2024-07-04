<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        // Mendapatkan pengguna yang sedang login
        $user = Auth::user();
        
        // Mengirimkan data ke tampilan
        return view('dashboard.index', [
            'title' => 'dashboard',
            
        ]);
    }
}
