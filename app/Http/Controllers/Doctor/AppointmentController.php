<?php

namespace App\Http\Controllers\Doctor;

use App\User;
use App\Patient; 
use App\Appointment;
use Illuminate\Http\Request;
use App\Http\Requests\AppointmentStoreRequest;
use App\Http\Requests\AppointmentUpdateRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $appointments = Appointment::orderBy('date','asc')
            ->search($search)
            ->where('doctor_id', Auth::user()->id)
            ->paginate(20);
        return view('doctor.appointments',compact('appointments','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients = Patient::paginate(10);
        return view('doctor.create_appointment',compact('patients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AppointmentStoreRequest $request)
    {
            $appointment = new Appointment([
                            'appointer_id'=>Auth::user()->id,
                            'doctor_id'=>Auth::user()->id,
                            'patient_id'=>$request->input('patient_id'),
                            'date'=>$request->input('date'),
                            'description'=>$request->input('description')

                        ]);
                            
        $appointment->save();
        return redirect()->route('doctor appointments');
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
        $appointment=Appointment::find($id);
        return view('doctor.edit_appointment',compact('appointment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AppointmentUpdateRequest $request, Appointment $appointment)
    {
        $appointment->update($request->except(['']));
        return redirect()->route('doctor appointments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $appointment = Appointment::find($id);
        $appointment->delete();
        return redirect()->route('doctor appointments');
    }
}
