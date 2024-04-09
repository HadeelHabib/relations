<?php

namespace App\Http\Controllers;

use App\Models\Paient;
use App\Models\Doctor;
use Illuminate\Http\Request;

class PaientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'name'=>'required|string',
                'email'=>'required',
            ]);

          
            try { 
               
                \DB::beginTransaction();
              
                $paient=Paient::create([
                    'name'=>$request->name ,
                    'email'=>$request->email,
    
                ]);
               
              
               $paient->doctrs()->attach($request->doctor_id);
         
                \DB::commit();
            return response()->json([
                'status'=>'succses',
                'paient'=>$paient
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
    public function show(Paient $paient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paient $paient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paient $paient)
    {
        //
    }
}
