<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function dashboard(){
        return view('dashboard.v_dash');
    }
    public function mastersurat(){
        return view ('managemensurat.v_mastersurat');
    }
    public function suratmasuk(){
        return view ('managemensurat.v_suratmasuk');
    }
    public function suratkeluar(){
        return view ('managemensurat.v_suratkeluar');
    }
}
