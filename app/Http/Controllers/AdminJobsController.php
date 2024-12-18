<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Works;
use App\Models\Location;
use App\Models\Company;
use App\Models\Types;
use Illuminate\Support\Facades\Auth;

class AdminJobsController extends Controller
{
    public function index()
    {
        $jobs = Works::with('location', 'company', 'type')->get();

        $tes = 'tes';

        return view('admin.jobs.index', compact('jobs'));
    }

    public function create()
    {
        $company = Company::all();
        $location = Location::all();
        $type = Types::all();

        return view('admin.jobs.create', compact('company', 'location', 'type'));
    }

    public function show($workId)
    {
        $jobs = Works::findOrFail($workId);

        return view('admin.jobs.show', compact('jobs'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jobsTitle' => 'required|string|max:255',
            'jobsImage' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'jobsDescription' => 'required|string|max:5000',
            'jobsCompany' => 'required|exists:company,id',
            'jobsLocation' => 'required|exists:location,id',
            'jobsType' => 'required|exists:types,id',
            'jobsMax' => 'required|string|max:255',
            'jobsSalary' => 'required|string|max:255',
        ],[
            'jobsTitle.required' => 'Jobs Title Field Is Required',
            'jobsImage,mimes' => 'File Image Not Support',
            'jobsImage.required' => 'Jobs Image Is Required',
            'jobsCompany.required' => 'Jobs Company Field Is Required',
            'jobsLocation.required' => 'Jobs Locatioon Field Is Required',
            'jobsType.required' => 'Jobs Type Field Is Required',
            'jobsSalary.required' => 'Jobs Salary Field Is Required',
        ]);

            if($validator->fails()) {
                $error = $validator->errors();
                return redirect()->route('admin.jobs.create')
                                ->withErrors($validator)
                                ->withInput();
            }

        
            if ($request->hasFile('jobsImage')) {
                $image = $request->file('jobsImage');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('JobsImage', $imageName, 'public');
            }


            Works::create([
                'title' => $request->jobsTitle,
                'image' => $imageName,
                'description' => $request->jobsDescription,
                'company_id' => $request->jobsCompany,
                'location_id' => $request->jobsLocation,
                'type_id' => $request->jobsType,
                'max_assign' => $request->jobsMax,
                'salary' => $request->jobsSalary,
            ]);

            return redirect()->route('admin.jobs.index')
                            ->with('success', 'Jobs Added Success');
    }

    public function edit(Works $job)
    {
        $company = Company::all();
        $location = Location::all();
        $type = Types::all();

        return view('admin.jobs.edit', compact('job', 'company', 'location', 'type'));
    }

    public function update(Request $request, Works $job)
    {
        $validator = Validator::make($request->all(), [
            'jobsTitle' => 'required|string|max:255',
            'jobsImage' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'jobsDescription' => 'required|string|max:255',
            'jobsCompany' => 'required|exists:company,id',
            'jobsLocation' => 'required|exists:location,id',
            'jobsType' => 'required|exists:types,id',
            'jobsMax' => 'required|string|max:255',
            'jobsSalary' => 'required|string|max:255',
        ]);

            // dd($request);

            if($validator->fails()) {
                $error = $validator->errors();
                return redirect()->route('admin.jobs.index')
                                ->withErrors($validator)
                                ->withInput();
            }

            // dd($request);

            if ($request->hasFile('jobsImage')) {
                    if ($job->image && file_exists(storage_path('storage/' . $job->image))) {
                    unlink(storage_path('storage/' . $job->image));
                    }

                    $image = $request->file('jobsImage');
                    $imageName = time() . '.' . $image->extension();
                    $image->storeAs('JobsImage', $imageName, 'public');
                } else {
                    $imageName = $job->image;
                }

                // dd($request);

                $job->update([
                    'title' =>$request->jobsTitle,
                    'image' =>$imageName,
                    'description' => $request->jobsDescription,
                    'company_id' => $request->jobsCompany,
                    'location_id' => $request->jobsLocation,
                    'type_id' => $request->jobsType,
                    'max_assign' => $request->jobsMax,
                    'salary' => $request->jobsSalary,
                ]);

                return redirect()->route('admin.jobs.index')
                                ->with('success', 'Jobs Update Success');
    }

    public function destroy(Works $job)
    {
        try{
            $job->delete();
            return redirect()->route('admin.jobs.index')
                            ->with('success', 'Jobs Delete Success');
        } catch(\Exception $e) {
            return redirect()->route('admin.jobs.index')
                            ->with('error', 'Jobs Delete Error');
        }
    }
}
