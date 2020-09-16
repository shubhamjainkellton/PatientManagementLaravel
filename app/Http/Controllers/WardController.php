<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Ward;
use App\User;
use App\Patient;
use DB;

class WardController extends Controller
{
    public function create(){
        $patient = DB::select('select * from patients' , [1]);;
        $doc = DB::select('select * from users where role_id = 2', [1]);
        return view('admit_ward/create',['patients'=> $patient, 'docs' => $doc]);
    }
    public function store(){

        $this->validateWard();
        $wardadmit = new Ward;
        $wardadmit->patient_name = request()->get('patient_name');
        $wardadmit->doc_name = request()->get('doc_name');
        $wardadmit->department = request()->get('department');
        $wardadmit->ward_type = request()->get('ward_type');
        $wardadmit->bed_no = request()->get('bed_no');
        $wardadmit->date = request()->get('date');
        $wardadmit->status = request()->input('status', 0); 
        $wardadmit->save();

        return redirect('/admit_ward')->with('success', 'Patient admitted successfully');
    }

    public function warddepart(Ward $wardadmit){

        return view('depart_ward.create',['wardadmit'=>$wardadmit]);


    }
    public function wardstore(Ward $wardadmit){

        $wardadmit->update([
            'patient_name' => request()->get('patient_name'),
            'doc_name' => request()->get('doc_name'),
            'department' => request()->get('department'),
            'ward_type' => request()->get('ward_type'),
            'bed_no' => request()->get('bed_no'),
            'No_of_days' => request()->get('No_of_days'),
            'charges' => request()->get('charges'),
            'date' => request()->get('date'),
            'status' => request()->input('status', 1),

        ]);

        return redirect('/depart_ward')->with('success', 'Patient departed successfully');;


    }
    

    public function index(){
        
        $wardadmit = DB::table('wards')->latest()->paginate(20);
        return view('admit_ward.index', ['wardadmits'=>$wardadmit])->with('i', ((request()->input('page', 1) - 1) * 20));

    }
    public function edit(Ward $wardadmit){
        $patients = DB::select('select * from patients' , [1]);
        $docs = DB::select('select * from users where role_id = 2', [1]);
        return view('admit_ward.edit',compact('wardadmit', 'patients', 'docs'));
    }
    public function update(Ward $wardadmit){

        $wardadmit->update($this->validateWard());
         return redirect('/admit_ward')->with('success', 'Admitted patient updated successfully');

    }
    public function destroy(Ward $wardadmit){

        $wardadmit=Ward::find($wardadmit);  
        $wardadmit->each->delete(); 
        return redirect('/admit_ward')->with('success', 'Admitted patient deleted successfully'); 
        
    } 
    public function search(Request $request){

        $search = $request->get('search');
        $wardadmit = Ward::where('patient_name','like','%'.$search.'%')->latest()->paginate(20);
        return view('admit_ward.index',['wardadmits'=>$wardadmit])->with('i', ((request()->input('page', 1) - 1) * 20));
    }
    public function validateWard(){
        return request()->validate([  
            'patient_name' => 'required',
            'doc_name' => 'required',
            'department' => 'required',
            'ward_type' => 'required',
            'bed_no' => 'required',
            'status' => 'required',
            'date' => 'required',
        ]);
    }  
}
