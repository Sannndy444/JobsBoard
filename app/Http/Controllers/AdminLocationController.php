<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLocationController extends Controller
{
    public function index()
    {
        return view('admin.location.index');
    }
}