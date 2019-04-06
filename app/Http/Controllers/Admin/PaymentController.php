<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\PaymentMethodRequest;
use App\PaymentMethod;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $search = $request->input('search');
        $payment_methods = PaymentMethod::search($search)
            ->orderBy('name', 'asc')
            ->paginate(20);

        return view('admin.payments', compact('payment_methods', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_payment_type');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentMethodRequest $request)
    {
        $payment_method_delete = PaymentMethod::onlyTrashed()
            ->where('name', $request->name)
            ->first();
        
        if ($payment_method_delete == NULL) {
            $payment_method = new PaymentMethod;

            $payment_method->name = $request->name;
            $payment_method->save();
        } else {
            $payment_method_delete->restore();
            $payment_method_delete->update($request->except(['']));
        }
        
        return redirect()->route('admin payments');
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
        $payment_method = PaymentMethod::find($id);

        return view('admin.edit_payment_type', compact('payment_method'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PaymentMethodRequest $request, $id)
    {
        //
        $payment_method = PaymentMethod::find($id);

        $payment_method_delete = PaymentMethod::onlyTrashed()
            ->where('name', $request->name)
            ->first();
        
        if ($payment_method_delete == NULL) {
            $payment_method->update($request->except(['']));
        } else {
            $payment_method->delete();
            $payment_method_delete->restore();
            $payment_method_delete->update($request->except(['']));
        }

        return redirect()->route('admin payments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $payment_method = PaymentMethod::find($id);
        $payment_method->delete();
        return redirect()->route('admin payments');
    }
}
