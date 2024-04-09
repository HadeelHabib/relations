<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\Section;
class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $section=Section::with('doctors')->get();
        return response()->json([
            'status'=>'succses',
            'section'=>$section
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name'=>'required|string',
                'email'=>'required',
                'phone'=>'required|numeric',
                'section_id'=>'required',
            ]);


            try {
                \DB::beginTransaction();
                $doctor=Doctor::create([
                    'name'=>$request->name ,
                    'email'=>$request->email,
                    'phone'=>$request->phone,
                    'section_id'=>$request->section_id,

    
                ]);
                \DB::commit();
            return response()->json([
                'status'=>'succses',
                'doctor'=>$doctor
            ]);
            } catch (\Throwable $th) {
                \DB::rollBack();
                
                return response()->json([
                    'status'=>'error',
                    
                ]);
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}
