<?php

namespace App\Http\Controllers\Assistant;

use App\Patient;
use App\BloodType;
use App\InsuranceType;
use App\Gender;
use Illuminate\Http\Request;
use App\Http\Requests\PatientStoreRequest;
use App\Http\Requests\PatientUpdateRequest;
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
        $genders=Gender::all();
        $insurance_types=InsuranceType::all();
        $blood_types=BloodType::all();
        return view('assistant.create_patient',compact('insurance_types','blood_types','genders'));
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
        $patient = new Patient([
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
        $patient=Patient::find($id);
        $insurance_types=InsuranceType::all();
        $blood_types=BloodType::all();
        return view('assistant.edit_patient',compact('patient','insurance_types','blood_types'));
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
