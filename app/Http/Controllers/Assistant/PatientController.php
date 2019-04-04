<?php

namespace App\Http\Controllers\Assistant;

use App\Patient;
use App\BloodType;
use App\Person;
use App\InsuranceType;

use Illuminate\Http\Request;
use App\Http\Requests\InsuranceTypeStoreRequest;
use App\Http\Requests\InsuranceTypeUpdateRequest;
use App\Http\Controllers\Controller; 

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
        $patients = Patient::orderBy('name','asc')
            //->search($search)
            ->orderBy('name','asc')
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
        return view('assistant.create_patient');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $patient = new Patient([
                            'patient_state_id'=>$request->input('patient_state_id'),
                            'insurance_type_id'=>$request->input('insurance_type_id'),
                            'gender_id'=>$request->input('gender_id'),
                            'blood_type_id'=>$request->input('blood_type_id'),
                            'description'=>$request->input('description'),
                            'name'=>$request->input('name'),
                            'home_address'=>$request->input('home_address'),
                            'phone'=>$request->input('phone'),
                            'email'=>$request->input('email')]);
                            
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('assistant.edit_patient');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
