<?php

namespace App\Http\Controllers\Doctor;


use PDF;
use App\Item; 
use App\ItemType;
use App\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\ItemStoreRequest;
use App\Http\Requests\ItemUpdateRequest;
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**  
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $items = Item::where('doctor_id',Auth::id())
            ->orderBy('name','asc')
            ->search($search)
            ->paginate(20);
        return view('doctor.items',compact('items','search'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types_items = ItemType::all();
        $brands = Brand::all();
        return view('doctor.create_item',compact('types_items','brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemStoreRequest $request)
    {
        $item = new Item([
                            'doctor_id'=>Auth::id(),
                            'brand_id'=>$request->input('brand_id'),
                            'item_type_id'=>$request->input('item_type_id'),
                            'name'=>$request->input('name'),
                            'cost'=>$request->input('cost'),
                            'quantity'=>$request->input('quantity'),
                            'expiration_date'=>$request->input('expiration_date'),
                            'purchase_date'=>$request->input('purchase_date'),
                            'description'=>$request->input('description'),
                            'batch'=>$request->input('batch')
 

                        ]);
                            
        $item->save();
        return redirect()->route('doctor items');
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
        $item=Item::find($id);
        $types_items=ItemType::all();
        $brands=Brand::all();
        return view('doctor.edit_item',compact('item','types_items','brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ItemUpdateRequest $request, Item $item)
    {   
        $item->update($request->except(['']));
        return redirect()->route('doctor items');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('doctor items');
    }

    public function showPDF(Request $request){
        $items = Item::where('doctor_id',Auth::id())
            ->orderBy('item_type_id','asc');

        $item_types = ItemType::orderBy('name','asc')->get();
        $pdf = PDF::loadView('pdf', compact('items','item_types'));
        return $pdf->stream('Inventario.pdf');
        
    }

}
