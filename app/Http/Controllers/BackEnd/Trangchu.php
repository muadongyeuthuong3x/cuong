<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Trangchu extends Controller
{
    public function index(){
        return view('back_end.herder.herder');
    }
}
