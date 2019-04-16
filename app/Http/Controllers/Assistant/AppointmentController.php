<?php

namespace App\Http\Controllers\Assistant;

use App\User;
use App\Patient; 
use App\Appointment;
use Illuminate\Http\Request;
use App\Http\Requests\AppointmentStoreRequest;
use App\Http\Requests\AppointmentUpdateRequest;
use Illuminate\Support\Facades\Auth;
use DB;
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
        $appointments = DB::table('appointments as a')
            ->leftjoin('patients as b','a.patient_id','=','b.id')
            ->leftjoin('users as c','a.doctor_id','=','c.id')
            ->leftjoin('users as d','a.appointer_id','=','d.id')
            ->where('a.date','like','%'.$search.'%')
            ->orWhere('a.description','like','%'.$search.'%')
            ->orwhere('b.name', 'like', '%'.$search.'%')
             ->select('a.*', 'b.name as namepatient','b.email as email','d.name as nameuser')
            ->get();


        return view('assistant.appointments',compact('appointments','search'));
    }





    /**
    $appointments = DB::table('appointments')
            ->leftjoin('users','appointments.doctor_id','=','users.assigned_doctor')
            ->search($search)
            ->where('users.id', '=', Auth::user()->id)
             ->select('appointments.*')
             ->paginate(20);
            ->get();

     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients = Patient::paginate(10);
        return view('assistant.create_appointment',compact('patients'));
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
                            'doctor_id'=>Auth::user()->assigned_doctor,
                            'patient_id'=>$request->input('patient_id'),
                            'date'=>$request->input('date'),
                            'description'=>$request->input('description')

                        ]);

                            
        $appointment->save();
        return redirect()->route('assistant appointments');
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
        return view('assistant.edit_appointment',compact('appointment'));
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
        return redirect()->route('assistant appointments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointment = Appointment::find($id);
        $appointment->delete();
        return redirect()->route('assistant appointments');
    }
}
