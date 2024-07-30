<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboradController extends Controller
{
    //this dashborad page show customer
    public function index(){
        return view('dashborad');
    }
}
