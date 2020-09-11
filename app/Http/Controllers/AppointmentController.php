<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Appointment;
use App\Patient;
use App\User;

class AppointmentController extends Controller
{
    public function create(){

        $patient = DB::select('select * from patients' , [1]);;
        $doc = DB::select('select * from users where role_id = 2', [1]);
        return view('appointment.create',['patients'=> $patient, 'docs' => $doc]);

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

        

        $this->validateAppointment();
        $appointment = new Appointment;
        $appointment->doc_name = request()->get('doc_name');
        $appointment->department = request()->get('department');
        $appointment->patient_id = request()->get("patient_id", $patient->id);
        $appointment->patient_name = request()->get('patient_name');
        $appointment->date = request()->get('date');
        $appointment->time = request()->get('time');
        $appointment->save();

        return redirect('/appointment')->with('success', 'Appointment created successfully');

    }
    public function index(){

        $appointment = DB::table('appointments')->latest()->paginate(20);
        return view('appointment.index', ['appointments'=>$appointment])->with('i', ((request()->input('page', 1) - 1) * 20));

    }
    public function edit(Appointment $appointment){
        $patients = DB::select('select * from patients' , [1]);
        $docs = DB::select('select * from users where role_id = 2', [1]);
        
        return view('appointment.edit',compact('appointment', 'patients', 'docs'));

    }
    public function update(Appointment $appointment){
        
        $appointment->update([
            'doc_name' => request()->get('doc_name'),
            'department' => request()->get('department'),
            'patient_id' => request()->get("patient_id"),
            'patient_name' => request()->get('patient_name'),
            'date' => request()->get('date'),
            'time' => request()->get('time'),
            ]);
        return redirect('/appointment')->with('success', 'Appointment updated successfully' );
    }
    public function destroy(Appointment $appointment){

        $appointment = Appointment::find($appointment);  
        $appointment->each->delete(); 
        return redirect('/appointment')->with('success', 'Appointment deleted successfully'); 
        
    }
    public function search(Request $request){

        $search = $request->get('search');
        $appointment = Appointment::where('patient_name','like','%'.$search.'%')->orwhere('doc_name','like','%'.$search.'%')->latest()->paginate(20);
        return view('appointment.index',['appointments'=>$appointment])->with('i', ((request()->input('page', 1) - 1) * 20));
    }
    public function validatePatient()
    {

        return request([
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
