<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Doctor;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctor=Doctor::with('section')->get();
        return response()->json([
            'status'=>'succses',
            'doctor'=>$doctor
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
            ]);


            try {
                \DB::beginTransaction();
                $section=Section::create([
                    'name'=>$request->name ,
                    
    
                ]);
                \DB::commit();
            return response()->json([
                'status'=>'succses',
                'section'=>$section
            ]);
            } catch (\Throwable $th) {
                DB::rollBack();
               
                return response()->json([
                    'status'=>'error',
                    
                ]);
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Section $section)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        //
    }
}
