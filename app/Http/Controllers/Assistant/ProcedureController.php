<?php

/* Recodar que este hace referenia a tipos de materiales *** OJO ***/

namespace App\Http\Controllers\Assistant;
use App\ProcedureType;
use App\Procedure;
use App\Appointment;
use App\ProcedureType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\ProcedureStoreRequest;
use App\Http\Requests\ProcedureUpdateRequest;

class ProcedureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $procedures = Procedure::search($search)
            ->orderBy('created_at', 'asc')
            ->paginate(20);

        return view('assistant.procedures', compact('procedures', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $procedure_types = ProcedureType::all();
        $appointments = Appointment::where('date','>=',date('m/d/Y h:i:s a', time()))
            ->where('doctor_id',Auth::user()->assigned_doctor_id)
            ->get();
       return view('assistant.create_procedure',compact('appointments','procedure_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProcedureStoreRequest $request)
    {
        $procedure = new Procedure;

        $procedure->procedure_type_id = $request->procedure_type_id;
        $procedure->appointment_id = $request->appointment_id;
        $procedure->price = $request->price;
        $procedure->save();
       
        
        return redirect()->route('assistant procedures');
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
        $appointments = Appointment::where('date','>=',date('m/d/Y h:i:s a', time()))
            ->where('doctor_id',Auth::user()->assigned_doctor_id)
            ->get();
        $procedure = Procedure::find($id);
        $procedure_types = ProcedureType::all();
        return view('assistant.edit_procedure', compact('procedure','appointments','procedure_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProcedureUpdateRequest $request, Procedure $procedure)
    {
        $procedure->update($request->except(['']));
        return redirect()->route('assistant procedures');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $procedure = Procedure::find($id);
        $procedure->delete();
        return redirect()->route('assistant procedures');
    }
}
