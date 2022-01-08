<?php

namespace App\Http\Controllers;

use App\Http\Model\dataAbsen;
use App\Http\Model\Siswa;
use App\User;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index () {
        $data  = dataAbsen::all();
        return view('frontend.index', compact('data'));
    }
}
