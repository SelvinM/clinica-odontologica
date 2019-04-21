<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProcedureTypeStoreRequest;
use App\Http\Requests\ProcedureTypeUpdateRequest;
use App\ProcedureType;


class ProcedureTypeController extends Controller
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
        $search = $request->input('search');
        $procedure_types = ProcedureType::search($search)
            ->orderBy('name', 'asc')
            ->paginate(20);
        return view('admin.procedure_types',compact('procedure_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_procedure_type');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProcedureTypeStoreRequest $request)
    {
         $procedure_type_deleted = ProcedureType::onlyTrashed()
            ->where('name', $request->input('name'))
            ->first();
        
        if ($procedure_type_deleted == NULL) {
            $procedure_type = new ProcedureType;

            $procedure_type->name = $request->name;
            $procedure_type->description = $request->description;
            $procedure_type->save();
        } else {
            $procedure_type_deleted->restore();
            $procedure_type_deleted->update($request->except(['']));
        }
        
        return redirect()->route('admin procedure types');
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
        $procedure_type = ProcedureType::find($id);
        return view('admin.edit_procedure_type',compact('procedure_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProcedureTypeUpdateRequest $request, ProcedureType $procedure_type)
    {
        $procedure_type_deleted = ProcedureType::onlyTrashed()
            ->where('name', $request->name)
            ->first();
        
        if ($procedure_type_deleted == NULL) {
            $procedure_type->update($request->except(['']));
        } else {
            $procedure_type->delete();
            $procedure_type_deleted->restore();
            $procedure_type_deleted->update($request->except(['']));
        }

        return redirect()->route('admin procedure types');
    }

   
    public function destroy($id)
    {
        $procedure_type = ProcedureType::find($id);
        $procedure_type->delete();
        return redirect()->route('admin procedure types');
    }
}
