<?php

namespace App\Http\Controllers\Doctor;


use App\Image;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\ImageStoreRequest;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageServiceProvider;
use App\Http\Controllers\Controller;

class ImageController extends Controller 
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointment_id=request()->route('appointment_id');
        $images=DB::table('images as a')
        ->where('a.appointment_id',$appointment_id)
        ->whereNull('a.deleted_at')
        ->get();
        return view('doctor.images',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    { 
        return view('doctor.create_image');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImageStoreRequest $request,$appointment_id)
    {
        $description=$request->get('description');
        $appointment_id=request()->route('appointment_id');
        $image=$request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        \Image::make($image)->save( public_path('/Expedientes/' . $filename ) );
    
         $image = new Image([
                            'description'=>$description,
                            'image'=>$filename,
                            'appointment_id'=>$appointment_id

                        ]);           
            $image->save();
        $images=DB::table('images as a')
        ->where('a.appointment_id',$appointment_id)
        ->whereNull('a.deleted_at')
        ->get();
         return view('doctor.images',compact('images'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $id=request()->route('img_id');
        $images=DB::table('images as a')
        ->where('a.id',$id)
        ->whereNull('a.deleted_at')
        ->get();
        return view('doctor.show_image',compact('images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $id=request()->route('appointment_id');
        $image=DB::table('images')
        ->where('id','=',$id)
        ->whereNull('deleted_at')
        ->update(['deleted_at' => now()]);
        return redirect()->back();
    }
}
