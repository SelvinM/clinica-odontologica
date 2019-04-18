<?php

/* Recodar que este hace referenia a tipos de materiales *** OJO ***/

namespace App\Http\Controllers\Admin;

use App\ItemType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\ItemTypeStoreRequest;
use App\Http\Requests\ItemTypeUpdateRequest;


class ItemTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $items_types = ItemType::search($search)
            ->orderBy('name', 'asc')
            ->paginate(20);

        return view('admin.item_types', compact('items_types', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.create_item_type');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemTypeStoreRequest $request)
    {
        //

        $item_type_delete = ItemType::onlyTrashed()
            ->where('name', $request->name)
            ->first();
        
        if ($item_type_delete == NULL) {
            $item_type = new ItemType;

            $item_type->name = $request->name;
            $item_type->description = $request->description;
            $item_type->save();
        } else {
            $item_type_delete->restore();
            $item_type_delete->update($request->except(['']));
        }
        
        return redirect()->route('admin item types');
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
        $item_type = ItemType::find($id);
        return view('admin.edit_item_type', compact('item_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ItemTypeUpdateRequest $request, ItemType $item_type)
    {
        $item_type_delete = ItemType::onlyTrashed()
            ->where('name', $request->input('name'))
            ->first();
        
        if ($item_type_deleted == NULL) {
            $item_type->update($request->except(['']));
        } else {
            $item_type->delete();
            $item_type_deleted->restore();
            $item_type_deleted->update($request->except(['']));
        }

        return redirect()->route('admin item types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = ItemType::find($id);
        $user->delete();
        return redirect()->route('admin item types');
    }
}
