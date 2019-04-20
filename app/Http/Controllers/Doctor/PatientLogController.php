<?php

namespace App\Http\Controllers\Doctor;

use App\User;
use App\Patient;  
use App\Appointment; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Http\Controllers\Controller;

class PatientLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //$search = $request->input('search');
        $patient=Patient::find($id); 
        $today = now()->format('Y-m-d');
        $appointments = DB::table('appointments as a')->where("a.patient_id","=",$id)
            ->whereNull('a.deleted_at')
            ->where('date','<=',$today)
            //->search($search)
            ->paginate(20);
        return view('doctor.patient_logs',compact('appointments','patient'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctor.create_patient_log');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('doctor.patient_logs');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('doctor.edit_patient_log');
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
        $appointment = Appointment::find($id);
        $appointment->delete();
        $patient_logs = DB::table('appointments as a')
                    ->select('p.id as id')
                    ->join('patients as p','p.id','a.patient_id')
                    ->where("a.id","=",$id);
        return redirect()->route('doctor patient logs',compact($patient_logs));
    }
}
