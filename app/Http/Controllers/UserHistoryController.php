<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Works;
use Illuminate\Support\Facades\Auth;
use App\Enums\Status;

class UserHistoryController extends Controller
{
    public function index()
    {
        $user = Auth::id();
        $jobs = Works::all();

        $application = Application::where('user_id', $user)
                                    ->whereIn('work_id', $jobs->pluck('id'))
                                    ->get()
                                    ->keyBy('work_id');

        $accept = Status::Accepted;

        $status = Application::where('status', $accept)
                                    ->get();
        return view('user.history.index', compact('application', 'status'));
    }
}
