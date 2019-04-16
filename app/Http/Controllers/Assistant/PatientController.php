<?php

namespace App\Http\Controllers\Assistant;

use App\Patient;

use App\BloodType;

use App\Gender;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\PatientStoreRequest;
use App\Http\Requests\PatientUpdateRequest;
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$search = $request->input('search');
         $id_doctor = DB::table('users')->select('assigned_doctor_id')->where('id', '=', Auth::id())->first();
        $patients = Patient::orderBy('name','asc')->where("doctor_id","=",$id_doctor->assigned_doctor_id)
            //->search($search)
            ->paginate(20);
        return view('assistant.patients', compact('patients','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genders=Gender::all();
        $blood_types=BloodType::all();
        $id_doctor = DB::table('users')->select('assigned_doctor_id')->where('id', '=', Auth::id())->first();
        return view('assistant.create_patient',compact('blood_types','genders','id_doctor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientStoreRequest $request)
    {
        //
        $patient = new Patient(['gender_id'=>$request->input('gender_id'),
                            'blood_type_id'=>$request->input('blood_type_id'),
                            'description'=>$request->input('description'),
                            'name'=>$request->input('name'),
                            'email'=>$request->input('email'),
                            'home_address'=>$request->input('home_address'),
                            'birthdate'=>$request->input('birthdate'),
                            'phone'=>$request->input('phone'),                            
                            'doctor_id'=>$request->input('id_doctor')]);
                            
        $patient->save();
        return redirect()->route('assistant patients');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $patient=Patient::find($id);
        $blood_types=BloodType::all();
        $genders=Gender::all();
        return view('assistant.patient_notes',compact('patient','blood_types','genders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient=Patient::find($id);
        $blood_types=BloodType::all();
        $genders=Gender::all();
        return view('assistant.edit_patient',compact('patient','blood_types','genders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PatientUpdateRequest $request, Patient $patient)
    {
        $patient->update($request->except(['']));
        return redirect()->route('assistant patients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('assistant patients');
    }
}
