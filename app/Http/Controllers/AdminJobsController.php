<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminJobsController extends Controller
{
    public function index()
    {
        return view('admin.jobs.index');
    }

    public function create()
    {
        
    }
}
