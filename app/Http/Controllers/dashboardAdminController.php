<?php

namespace App\Http\Controllers;

use App\Http\Model\mataPelajaran;
use Illuminate\Http\Request;

class dashboardAdminController extends Controller
{
    public function index ()
    {
        $mapel = mataPelajaran::all();
        return view('backend.dashboardAdmin', compact('mapel'));
    }
}
