<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ward;
use DB;
use Illuminate\Support\Facades\Validator;

class WardDepartController extends Controller
{
    
    public function index(){

        $warddepart = DB::table('wards')->latest()->paginate(20);
        return view('depart_ward.index', ['warddeparts'=>$warddepart])->with('i', ((request()->input('page', 1) - 1) * 20));
    }
    public function edit(Ward $warddepart){
        $patients = DB::select('select * from wards where status = 0' , [1]);

        return view('depart_ward.edit',compact('warddepart', 'patients'));
    }
    public function update(Ward $warddepart){

        $warddepart->update($this->validateWard());
         return redirect('/depart_ward')->with('success', 'Departed patient updated successfully');

    }
    // destroy method deletes a particular user details from database
    
    public function destroy(Ward $warddepart){

        $warddepart=Ward::find($warddepart);  
        $warddepart->each->delete(); 
        return redirect('/depart_ward')->with('success', 'Departed patient deleted successfully'); 
        
    }
    public function search(Request $request){

        $search = $request->get('search');
        $warddepart = Ward::where('patient_name','like','%'.$search.'%')->latest()->paginate(20);
        return view('depart_ward.index',['warddeparts'=>$warddepart])->with('i', ((request()->input('page', 1) - 1) * 20));
    }
    
    public function validateWard(){
        return request()->validate([  
            'patient_name' => 'required',
            'doc_name' => 'required',
            'department' => 'required',
            'ward_type' => 'required',
            'bed_no' => 'required',
            'No_of_days' => 'required',
            'charges' => 'required',
            'status' => 'required',
            'date' => 'required',
        ]);
    }     
}
