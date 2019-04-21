<?php

namespace App\Http\Controllers\Doctor;

use App\User;
use App\Patient;  
use App\Appointment;
use Illuminate\Http\Request;
use App\Http\Requests\AppointmentStoreRequest;
use App\Http\Requests\AppointmentUpdateRequest;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\MessageBag;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        date_default_timezone_set('US/Central');
    }
    public function index(Request $request)
    {
        $today = now()->format('Y-m-d');
        $search = $request->input('search');
        $appointments = Appointment::where('doctor_id',Auth::user()->id)
            ->where('date','>=',$today)
           ->orderBy('date','asc')
           ->search($search)
           ->paginate(15);
        return view('doctor.appointments',compact('appointments','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function create()
    {
        $patients = DB::table('patients as a')
        ->where("doctor_id",Auth::user()->id)
        ->limit(10)
        ->whereNull('a.deleted_at')
        ->get();
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
        $errors = new MessageBag;

        $date = $request->input('date');
        $fecha=array();
        $hora=array();
        preg_match('/[0-9]{4}-[0-9]{2}-[0-9]{2}/', $date, $fecha); //extrae fecha cita
        preg_match('/([0-9]{2}:)(?=[0-9]{2})/', $date, $hora); //extrae hora cita
        $citas = DB::table('appointments as a')
            ->where('a.date','like','%'.$hora[0].'%__:%__') //'%18:%__:%__'
            ->Where('a.date','like','%'.$fecha[0].'%') //'%2019-05-02%'
            ->where('a.doctor_id', '=',Auth::user()->id)
            ->select('a.date')
            ->get();

        $arr=array();
        foreach ($citas as $key => $dates) {
            $arr[]=$dates;
        }

        if (sizeof($arr)==0){
            $appointment = new Appointment([
                            'appointer_id'=>Auth::user()->id,
                            'doctor_id'=>Auth::user()->id,
                            'patient_id'=>$request->input('patient_id'),
                            'date'=>$request->input('date'),
                            'description'=>$request->input('description')

                        ]);           
            $appointment->save();
            return redirect()->route('doctor appointments');
        }else{
            $patient_old = $request->input('patient_id');
            $description_old = $request->input('description');

            // definir nombre de la variable y mensaje de error:     
            $errors->add('exist', 'Existe una cita guardada a esa hora ');
            // estos no son errores, lo hago para capturar lo datos enviados y reinsertarlos al formulario
            // para no tener que ingresar los datos de nuevo
            $errors->add('date_old', $date);
            $errors->add('patient_old',$patient_old);
            $errors->add('description_old', $description_old);

            return redirect()->route('doctor create appointment')->withErrors($errors);
        }
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
        $errors = new MessageBag;
        $date = $request->input('date');
        $fecha=array();
        $hora=array();
        preg_match('/[0-9]{4}-[0-9]{2}-[0-9]{2}/', $date, $fecha); //extrae fecha cita
        preg_match('/([0-9]{2}:)(?=[0-9]{2})/', $date, $hora); //extrae hora cita

        $citas = DB::table('appointments as a')
            ->where('a.date','like','%'.$hora[0].'%__:%__') //'%18:%__:%__'
            ->Where('a.date','like','%'.$fecha[0].'%') //'%2019-05-02%'
            ->where('a.doctor_id', '=',Auth::user()->id)
            ->where('a.id','!=',$appointment->id)
            ->select('a.date')
            ->get();

        $arr=array();
        foreach ($citas as $key => $dates) {
            $arr[]=$dates;
        }

        if (sizeof($arr)==0){
            $appointment->update($request->except(['']));
            return redirect()->route('doctor appointments');
        }else{
            $name_old = $request->input('name');
            $description_old = $request->input('description');

            // definir nombre de la variable y mensaje de error:     
            $errors->add('exist', 'Existe una cita guardada a esa hora ');
            // estos no son errores, lo hago para capturar lo datos enviados y reinsertarlos al formulario
            // para no tener que ingresar los datos de nuevo
            $errors->add('date_old', $date);
            $errors->add('name_old',$name_old);
            $errors->add('description_old', $description_old);
            return redirect()->back()->withErrors($errors);
        }
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
