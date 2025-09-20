<?php

namespace App\Http\Controllers\GC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GCController extends Controller
{
    public function index()
    {
        return view('GC.home');
    }
}
