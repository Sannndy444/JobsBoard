<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use Illuminate\Support\Facades\Validator;

class AdminLocationController extends Controller
{
    public function index()
    {
        $location = Location::all();

        return view('admin.location.index', compact('location'));
    }

    public function create()
    {
        return view('admin.location.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'locationName' => 'required|string|max:255',
            'locationDescription' => 'required|string|max:255',
        ],[
            'locationName.required' => 'Location Name Field Is Required',
            'locationDescription.required' => 'Location Description Field Is Required',
        ]);

            if($validator->fails()) {
                $error = $validator->error();
                return redirect()->route('admin.location.index')
                                ->withErrors($validator)
                                ->withInput();
            }

            

            Location::create([
                'name' => $request->locationName,
                'description' => $request->locationDescription,
            ]);

            return redirect()->route('admin.location.index')
                            ->with('success', 'Location Added Success');
    }

    public function edit(Location $location)
    {
        return view('admin.location.edit', compact('location'));
    }

    public function update(Location $location, Request $request)
    {
        $validator = Validator::make($request->all(),[
            'locationName' => 'required|string|max:255',
            'locationDescription' => 'required|string|max:255',
        ],[
            'locationName.required' => 'Location Name Field Is Reqired',
            'locationDescription.required' => 'Location Description Field Is Required',
        ]);

            if($validator->fails()) {
                $error = $validator->error();
                return redirect()->route('admin.location.index')
                                ->withErrors($validator)
                                ->withInput();
            }

            $location->update([
                'name' => $request->locationName,
                'description' => $request->locationDescription,
            ]);

            return redirect()->route('admin.company.index')
                            ->with('success', 'Location Update Success');
    }

    public function destroy(Location $location)
    {
        try{
            $location->delete();
            return redirect()->route('admin.location.index')
                            ->with('success', 'Location Delete Success');
        } catch(\Exception $e) {
            return redirect()->route('admin.location.index')
                            ->with('error', 'Location Delete Error');
        }
    }
}
