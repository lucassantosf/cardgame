<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth'); 
    }

    public function index(){
        $data = DB::table('config_game')->get();
        return view('home',compact('data'));
    }
}
