<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Enums\Status;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $application = Application::all();
        $file = Application::latest()->paginate(10);

        return view('admin.application.index', compact('application', 'file'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        //
    }

    public function download(Application $file)
    {
        $filePath = storage_path("/storage/{$file}");

        if (file_exists($filePath)) {
            return response()->download($filePath, $file);
        } else {
            abort(404, 'File not found');
        }
    }

    public function accepted($id)
    {
        $application = Application::findOrFail($id);
        
        $application->status = Status::Accepted; // Jika status adalah enum
        $application->save();

        return redirect()->route('admin.application.index')
                        ->with('success', 'Status Update Success');
    }

    public function rejected($id)
    {
        $application = Application::findOrFail($id);

        $application->status = Status::Rejected; // Jika status adalah enum
        $application->save();

        return redirect()->route('admin.application.index')
                        ->with('success', 'Status Update Success');
    }
}

