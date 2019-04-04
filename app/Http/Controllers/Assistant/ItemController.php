<?php

namespace App\Http\Controllers\Assistant;



use App\Item;
use App\ItemType;
use App\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\ItemStoreRequest;
use App\Http\Requests\ItemUpdateRequest;
use App\Http\Controllers\Controller; 

class ItemController extends Controller
{
    /**  
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$search = $request->input('search');
        $items = Item::orderBy('name','asc')
            //->search($search)
            ->paginate(20);
        return view('assistant.items',compact('items','search'));
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
        return view('assistant.create_item',compact('types_items','brands'));
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
                            'brand_id'=>$request->input('brand_id'),
                            'item_type_id'=>$request->input('item_type_id'),
                            'name'=>$request->input('name'),
                            'price'=>$request->input('price'),
                            'cost'=>$request->input('cost'),
                            'quantity'=>$request->input('quantity'),
                            'expiration_date'=>$request->input('expiration_date')]);
                            
        $item->save();
        return redirect()->route('assistant items');
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
        return view('assistant.edit_item',compact('item','types_items','brands'));
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
        return redirect()->route('assistant items');
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
        return redirect()->route('assistant items');
    }
}
