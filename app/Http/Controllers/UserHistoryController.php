<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class UserHistoryController extends Controller
{
    public function index()
    {
        $application = Application::with('work')->get();
        return view('user.history.index', compact('application'));
    }
}
