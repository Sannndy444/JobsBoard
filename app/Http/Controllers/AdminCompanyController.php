<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class AdminCompanyController extends Controller
{
    public function index()
    {
        $company = Company::all();

        return view('admin.company.index', compact('company'));
    }

    public function create()
    {
        return view('admin.company.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'companyName' => 'required|string|max:255',
            'companyDescription' => 'required|string|max:5000',
        ],[
            'companyName.required' => 'Company Name Field Is Required',
            'companyDescription.required' => 'Company Description Field Is Required',
        ]);

            if($validator->fails()) {
                $error = $validator->error();
                return redirect()->route('admin.company.index')
                                ->withErrors($validator)
                                ->withInput();
            }

            Company::create([
                'name' => $request->companyName,
                'description' => $request->companyDescription,
            ]);

            return redirect()->route('admin.company.index')
                            ->with('success', 'Company Added Success');
    }

    public function edit(Company $company)
    {
        
        return view('admin.company.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        $validator = Validator::make($request->all(), [
            'companyName' => 'required|string|max:255',
            'companyDescription' => 'required|string|max:5000',
        ],[
            'companyName.required' => 'Name Field Is Required',
            'companyDescription.required' => 'Description Field Is Required',
        ]);

            if($validator->fails()) {
                $error = $validator->error();
                return redirect()->route('admin.company.index')
                                ->withErrors($validator)
                                ->withInput();
            }

            $company->update([
                'name' => $request->companyName,
                'description' => $request->companyDescription, 
            ]);

            return redirect()->route('admin.company.index')
                            ->with('success', 'Company Update Succes');
    }

    public function destroy(Company $company)
    {
        try{
            $company->delete();
            return redirect()->route('admin.company.index')
                            ->with('success', 'Company Delete Success');
        } catch(\Exception $e) {
            return redirect()->route('admin.company.index')
                            ->with('error', 'Company Delete Error');
        }
    }
}
