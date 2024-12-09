<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Works;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;


class UserJobsController extends Controller
{
    public function index()
    {
        $jobs = Works::with('company', 'location', 'type')->get();

        return view('user.jobs.index', compact('jobs'));
    }

    public function create($id)
    {
        dd($id);
        return view('user.jobs.create');
    }

    public function store(Request $request, Works $jobs)
    {

        // $validator = Validator::make($request->all(), [
        //     'work_id' => 'required|exists:work,id',
        //     'resume' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        //     'cover_letter' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        //     'status' => 'required|string|max:255'
        // ]);

        //     if($validator->fails()) {
        //         $error = $validator->errors();
        //         return redirect()->route('user.jobs.index')
        //                         ->withErrors($validator)
        //                         ->withInput();
        //     }

            $resume = $this->uploadFile($request->file('resume'), 'resume');
            $cover_letter = $this->uploadFile($request->file('cover_letter'), 'CoverLetter');


                Application::create([
                    'work_id' => $request->work_id,
                    'user_id' => auth()->id(),
                    'resume' => $resume,
                    'cover_letter' => $cover_letter,
                    'status' => $request->status,
                ]);

                return redirect()->route('user.jobs.index')
                                ->with('success', 'Assign Jobs Send');
    }

    public function assign($id)
    {
        $jobs = $id;
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
