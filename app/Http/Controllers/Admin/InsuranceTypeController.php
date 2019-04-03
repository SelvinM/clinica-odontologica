<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\InsuranceTypeStoreRequest;
use App\Http\Requests\InsuranceTypeUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\InsuranceType;
class InsuranceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $insurance_types = InsuranceType::orderBy('name','asc')
            ->search($search)
            ->paginate(20);
        return view('admin.insurance_types',compact('insurance_types','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_insurance_type');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InsuranceTypeStoreRequest $request)
    {
        $insurance_type = new InsuranceType([
            'name'=>$request->input('name'), //Input('name') es el nombre de variable en el formulario
        ]);
        $insurance_type->save();

        return redirect()->route('admin insurance types');
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
    public function edit(InsuranceType $insurance_type)
    {

        return view('admin.edit_insurance_type',compact('insurance_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InsuranceTypeUpdateRequest $request, InsuranceType $insurance_type)
    {
        $insurance_type->name = $request->input('name');
        $insurance_type->save();
        return redirect()->route('admin update insurance types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(InsuranceType $insurance_type)
    {
        $insurance_type->delete();
        return redirect()->route('admin insurance types');
    }
}
