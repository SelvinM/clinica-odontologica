<?php

/* Recodar que este hace referenia a tipos de materiales *** OJO ***/

namespace App\Http\Controllers\Admin;

use App\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\BrandStoreRequest;
use App\Http\Requests\BrandUpdateRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $brands = Brand::search($search)
            ->orderBy('name', 'asc')
            ->paginate(20);

        return view('admin.brands', compact('brands', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.create_brand');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandStoreRequest $request)
    {
        //

        $brand_delete = Brand::onlyTrashed()
            ->where('name', $request->name)
            ->first();
        
        if ($brand_delete == NULL) {
            $brand = new Brand;

            $brand->name = $request->name;
            $brand->save();
        } else {
            $brand_delete->restore();
            $brand_delete->update($request->except(['']));
        }
        
        return redirect()->route('admin brands');
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
        $brand = Brand::find($id);
        return view('admin.edit_brand', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandUpdateRequest $request, Brand $brand)
    {
        $brand_delete = brand::onlyTrashed()
            ->where('name', $request->name)
            ->first();
        
        if ($brand_delete == NULL) {
            $brand->update($request->except(['']));
        } else {
            $brand->delete();
            $brand_delete->restore();
            $brand_delete->update($request->except(['']));
        }

        return redirect()->route('admin brands');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect()->route('admin brands');
    }
}
