<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Works;
use App\Models\Location;
use App\Models\Company;

class AdminJobsController extends Controller
{
    public function index()
    {
        $jobs = Works::with('location', 'company')->get();

        return view('admin.jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('admin.jobs.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jobsTitle' => 'required|string|max:255',
            'jobsImage' => 'required|image|mimes:jpg,png,jpeg|max:2048|unique:works,image',
            'jobsCompany' => 'required|exists:company,id',
            'jobsLocation' => 'required|exists:location,id',
            'jobsSalary' => 'required|string|max:255',
        ]);
    }
}
