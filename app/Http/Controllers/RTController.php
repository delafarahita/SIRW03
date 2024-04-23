<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RTController extends Controller
{
    public function index() {
        return view('admin.dashboard');
    }
}
