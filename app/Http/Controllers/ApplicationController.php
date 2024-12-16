<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Works;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Enums\Status;
use Carbon\Carbon;
use Response;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $application = Application::all();
        $file = Application::latest()->paginate(10);

        $accept = Status::Accepted;

        $statusAccept = Application::where('status', $accept)
                                    ->pluck('id');

        $reject = Status::Rejected;

        $statusReject = Application::where('status', $reject)
                                    ->pluck('id');

        return view('admin.application.index', compact('application', 'file', 'statusAccept', 'statusReject'));
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

    public function downloadResume($nameFile)
    {
        // Lokasi file
        $filePath = "storage/resume/{$nameFile}";

        // Cek apakah file ada
        if (!Storage::disk('public')->exists($filePath)) {
            abort(404, 'File not found');
        }

        // Proses download file
        return Storage::disk('public')->download($filePath, $nameFile);
    }

    public function downloadCover($fileName)
    {
        // Lokasi file
        $filePath = "storage/CoverLetter/{$fileName}";

        // Cek apakah file ada
        if (!Storage::disk('public')->exists($filePath)) {
            abort(404, 'File not found');
        }

        // Proses download file
        return Storage::disk('public')->download($filePath, $fileName);
    }

    public function accepted(Request $request, $id)
    {
        $application = Application::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'link' => 'required|string|max:5000'
        ]);

            if($validator->fails()) {
                $error = $validator->errors();
                return redirect()->route('admin.application.index')
                                ->withErrors($validator)
                                ->withInput();
            }

        $dueDate = Carbon::createFromFormat('m/d/Y', $request->input('date'))->format('Y-m-d');
        
        $application->update([
            'status' => Status::Accepted,
            'date' => $dueDate,
            'time' => $request->time,
            'link' => $request->link
        ]);
        

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

    // public function link(Request $request, $jobs)
    // {
        

    //         Application::create([
    //             'date' => $request->date,
    //             'time' => $request->time,
    //             'link' => $request->link,
    //         ]);

    //         return redirect()->route('admin.application.index')
    //                         ->with('success', 'Accepted Application Is Success');
    // }
}

