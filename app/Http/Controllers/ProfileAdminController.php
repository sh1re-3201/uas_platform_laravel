<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileAdminController extends Controller
{
    public function show()
    {
        return view('editProfile');
    }
}
