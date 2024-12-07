<?php

namespace App\Http\Controllers;

use App\Models\Types;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type = Types::all();
        return view('admin.type.index', compact('type'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'typeName' => 'required|string|max:255|unique:types,id',
        ],[
            'typeName.required' => 'Type Name Field Is Required',
            'typeName.unique' => 'Type Name Already Exists',
        ]);

            if($validator->fails()) {
                $error = $validator->error();
                return redirect()->route('admin.type.index')
                                ->withErrors($validator)
                                ->withInput();
            }

            Types::create([
                'name' => $request->typeName,
            ]);

            return redirect()->route('admin.type.index')
                            ->with('success', 'Type Added Success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Types $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Types $type)
    {
        return view('admin.type.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Types $type)
    {
        $validator = Validator::make($request->all(), [
            'typeName' => 'required|string|max:255|unique:types,id',
        ],[
            'typeName.required' => 'Type Name Field Is Required',
            'typeName.unique' => 'Type Name Already Exists',

        ]);

            if($validator->fails()) {
                $error = $validator->errors();
                return redirect()->route('admin.type.index')
                                ->withErrors($validator)
                                ->withInput();
            }

            $type->update([
                'name' => $request->typeName,
            ]);

            return redirect()->route('admin.type.index')
                            ->with('success', 'Type Update Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Types $type)
    {
        try{
            $type->delete();
            return redirect()->route('admin.type.index')
                            ->with('success', 'Type Delete Success');
        } catch(\Exception $e) {
            return redirect()->route('admin.type.index')
                            ->with('error', 'Type Delete Error');
        }
    }
}
