<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardprofile extends Controller
{
    public function index()
    {
        return view('dashboard.dashboardadmin.index',[
       ]);
    }
}
