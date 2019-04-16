<?php

namespace App\Http\Controllers;

use App\User;
use App\Patient; 
use App\Appointment; 
use DB;
use Illuminate\Http\Request;

class DynamicDependent extends Controller
{
    public function fetch(Request $request){
        $search = $request->get('valor');
        if ($search!='') {
        	$data = Patient::orderBy('name','asc')
       		->patforapp($search) //patforapp= patient for appointment
       		->paginate(10);
        }else{
        	$data = $patients = Patient::orderBy('name','asc')
        	->paginate(10);
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
