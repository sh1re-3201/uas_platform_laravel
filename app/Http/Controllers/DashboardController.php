<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user(); // ambil user yang sedang login
        return view('dashboard', compact('user'));
    }
}