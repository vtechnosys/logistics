<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\celebration;
class CelebrationController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about=celebration::get();
        return view('backend.celebration.display_client',compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.celebration.add_client');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasfile('images'))
        {
            
            foreach($request->file('images') as $file)
            {
                
                
                $filename=time() . '_' . $file->getClientOriginalName();
                $file->move('backend/image/',$filename);
                $imgData[]=$filename;
            }
            $gallery=new celebration([
                'title'=>$request->get('title'),
                'images'=>json_encode($imgData),
                'status'=>'active'
            ]);

            $gallery->save();
            return redirect('/celebration_details'); 
        }  
        
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
        $gallery=celebration::find($id);
        return view('backend.celebration.update_client',compact('gallery'));
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
        $file=$request->hasfile('file');
        $status=$request->get('status');
        if($request->hasfile('images'))
        {
            
            foreach($request->file('images') as $file)
            {
                
                
                $filename=time() . '_' . $file->getClientOriginalName();
                $file->move('backend/image/',$filename);
                $imgData[]=$filename;
            }
            $gallery=celebration::find($id);
            $gallery->title=$request->get('title');
            $gallery->images=json_encode($imgData);
            $gallery->status=$status;
            $gallery->update();
        }
        else
        {
            $gallery=celebration::find($id);
            $gallery->title=$request->get('title');
            $gallery->status=$status;
            $gallery->update();
        }
        return redirect('/celebration_details');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery=celebration::find($id);
        $gallery->delete();
        return redirect('/celebration_details');
    }
}
