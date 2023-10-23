<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MController extends Controller
{
    public function index(){
        return view("m");
    }
}
