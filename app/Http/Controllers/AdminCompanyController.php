<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminCompanyController extends Controller
{
    public function index()
    {
        return view('admin.company.index');
    }
}
