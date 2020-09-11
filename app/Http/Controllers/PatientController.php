<?php

namespace App\Http\Controllers;

use DB;
use App\Patient;
use App\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PatientController extends Controller
{
    public function create(){

        return view('patient.create');
    }
    public function store(){

        $this->validatePatient();
        $patient = new Patient;
        $patient->name = request()->get('name');
        $patient->email = request()->get('email');
        $patient->address = request()->get('address');
        $patient->phone_no = request()->get('phone_no');
        $patient->gender = request()->get('gender');
        $patient->age = request()->get('age');
        $patient->blood_grp = request()->get('blood_grp');
        $patient->dob = request()->get('dob');
        $patient->save();
        
        return redirect('/patient')->with('success', 'Patient created successfully');

    }
    public function index(){
        $patient = DB::table('patients')->latest()->paginate(20);
        return view('patient.index', ['patients'=>$patient])->with('i', ((request()->input('page', 1) - 1) * 20));

    }
    public function edit(Patient $patient){
        
        return view('patient.edit', compact('patient'));
    }
    public function update(Patient $patient){

        $patient->update($this->validatePatient());
        return redirect('/patient')->with('success', 'Patient updated successfully');
    }
    public function destroy(Patient $patient){

        $patient=Patient::find($patient);  
        $patient->each->delete();  
        return redirect('/patient')->with('success', 'Patient deleted successfully');

    } 
    public function validatePatient(){
        return request()->validate([  
            'name' =>'required',  
            'email' =>['required','email'],  
            'address' =>'required',
            'phone_no' => ['required', 'digits:12', 'regex:/^(91)[6-9]{1}[0-9]{9}$/'],
            'gender'  => 'required',
            'age'  => 'required',
            'blood_grp' => 'required',
            'dob' => 'required'

        ]);
    } 
    public function show(Patient $patient){

        $doc = DB::select('select * from users where role_id = 2', [1]);
        return view('appointment.show', ['patient'=>$patient, 'docs'=>$doc]);

    }

    public function newStore(Patient $patient){
        $patient->update($this->validatePatient());
        $this->validateAppointment();
        $appointment = new Appointment;
        $appointment->doc_name = request()->get('doc_name');
        $appointment->department = request()->get('department');
        $appointment->patient_id = request()->get("patient_id");
        $appointment->patient_name = request()->get('patient_name');
        $appointment->date = request()->get('date');
        $appointment->time = request()->get('time');
        $appointment->save();

        return redirect('/appointment')->with('success', 'Appointment created successfully');

    }

    public function search(Request $request){

        $search = $request->get('search');
        $patient = Patient::where('name','like','%'.$search.'%')->latest()->paginate(20);
        return view('patient.index',['patients'=>$patient])->with('i', ((request()->input('page', 1) - 1) * 20));
    }
    public function validateAppointment()
    {

        return request([
            'doc_id' => "exists:id",
            'doc_name' =>"required",
            'department' => "required",
            'patient_id' => "exists:id",
            'patient_name' => "required",
            'date' => "required",
            'time' => "required",

        ]);
    } 
}
