<?php

namespace App\Http\Controllers\H_Operations;

use App\Http\Controllers\Controller;
use App\Models\H_departments;
use App\Models\H_operations;
use App\Models\H_patients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OperationsController extends Controller
{
    
    public function index($id)
    {
        $data['patient']=H_patients::findorfail($id);
        // return $data['patient'];
        $data['departments']=H_departments::get();
        return view('pages.backend.admins.h_operations.create',$data);
    }

    public function create(Request $request)
    {
        // return $request;
        H_operations::create([
          'type'=>$request->type,
          'cost'=>$request->cost,
          'patien_id'=>$request->patienid,
          'doctor_id'=>$request->doctor_id,
          'dept_id'=>$request->depart_id,
          'room_id'=>DB::table('h_rooms')->where('room_number', $request->room_no)->first()->id,
          'description'=>$request->description,
          'emp_id'=>Auth::user()->id,

        ]);
        return redirect()->back();
    }


    
    public function store(Request $request)
    {
        //
    }

    
    public function show()
    {
        $Operations=H_operations::all();
        return $Operations;
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
