<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Works;
use App\Models\Application;
use App\Models\JobAssignments;
use Illuminate\Support\Facades\Auth;
use App\Enums\Status;
use Illuminate\Support\Facades\DB;


class UserJobsController extends Controller
{
    public function index()
    {
        $jobs = Works::with('company', 'location', 'type')->get();
        
        $user = Auth::id();
        
        $existingAssign = Application::where('user_id', $user)
                                    ->whereIn('work_id', $jobs->pluck('id'))
                                    ->get()
                                    ->keyBy('work_id');

        $workCounts = Application::select('work_id', DB::raw('COUNT(*) as total'))
                                ->groupBy('work_id')
                                ->get()
                                ->keyBy('work_id');

                                

        return view('user.jobs.index', compact('jobs', 'existingAssign', 'workCounts'));
    }

    public function create($id)
    {
        return view('user.jobs.create');
    }

    public function show($workId)
    {
        $user = Auth::id();
        $jobs = Works::findOrFail($workId);

        $existingAssign = Application::where('user_id', $user)
                                        ->where('work_id', $jobs)
                                        ->first();

        return view('user.jobs.show', compact('jobs', 'existingAssign'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'work_id' => 'required|exists:work,id',
            'resume' => 'required|mimes:pdf|max:5048',
            'cover_letter' => 'required|mimes:pdf|max:5048',
            'date' => 'nuulable|date',
            'time' => 'nullable|date_format:H:i',
            'link' => 'nullable|string|max:5000'
        ]);

            if($validator->fails()) {
                $error = $validator->errors();
                return redirect()->route('user.jobs.assign')
                                ->withErrors($validator)
                                ->withInput();
            }

            $resume = $this->uploadFile($request->file('resume'), 'resume');
            $cover_letter = $this->uploadFile($request->file('cover_letter'), 'CoverLetter');


                Application::create([
                    'work_id' => $request->work_id,
                    'user_id' => Auth::id(),
                    'resume' => $resume,
                    'cover_letter' => $cover_letter,
                    'status' => Status::Pending,
                ]);

                return redirect()->route('user.jobs.index')
                                ->with('success', 'Assign Jobs Send');
    }

    public function assign($job)
    {
        $jobs =  $job;

        return view('user.jobs.assign', compact('jobs'));
    }

    private function uploadFile($file, $folder)
    {
        if ($file) {
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension(); // Menghindari nama file yang sama
            return $file->storeAs($folder, $fileName, 'public');
        }
        return null;
    }
}
