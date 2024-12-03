<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserJobsController extends Controller
{
    public function index()
    {
        return view('user.jobs.index');
    }
}
