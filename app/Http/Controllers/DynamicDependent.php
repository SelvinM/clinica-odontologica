<?php

namespace App\Http\Controllers;

use App\User;
use App\Patient; 
use App\Appointment; 
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DynamicDependent extends Controller
{
    public function fetch(Request $request){
        $search = $request->get('valor');
        $opc=$request->get('opc');
        $id_doctor = DB::table('users')->select('assigned_doctor_id')->where('id', '=', Auth::id())->first();
        if ($search!='') {
            if ($opc=='asistente') {
                $data = Patient::orderBy('name','asc')
                ->where("doctor_id","=",$id_doctor->assigned_doctor_id)
                ->search($search) //patforapp= patient for appointment
                ->paginate(10);
            }else{
                $data = Patient::orderBy('name','asc')
                ->where("doctor_id","=",Auth::id())
                ->search($search) //patforapp= patient for appointment
                ->paginate(10);
            }  
        }else{
            if ($opc=='asistente') {
                $data = $patients = Patient::orderBy('name','asc')
                ->where("doctor_id","=",$id_doctor->assigned_doctor_id)
                ->paginate(10);
            }else{
                $data = $patients = Patient::orderBy('name','asc')
                ->where("doctor_id","=",Auth::id())
                ->paginate(10);
            }
        }
        response()->json($data);
        if (count($data)==0){
        	$output = '<option value="">Ningún paciente encontrado</option>';
        }else{
        	$output = '<option value="">Escoja el paciente</option>';
        }
        foreach($data as $row){
            $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
        }
        echo $output;
    }
}
