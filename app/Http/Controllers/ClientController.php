<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\clients;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about=clients::get();
        return view('backend.client.display_client',compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.client.add_client');
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
            $gallery=new clients([
                        'title'=>$request->get('title'),
                        'img'=>json_encode($imgData),
                        'status'=>'active'
                    ]);

            $gallery->save();
            
        }  
        
        return redirect('/client_details'); 
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
        $gallery=clients::find($id);
        return view('backend.client.update_client',compact('gallery'));
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
        if($file)
        {
            foreach($request->file('file') as $file)
            {
                
                
                $filename=time() . '_' . $file->getClientOriginalName();
                $file->move('backend/image/',$filename);
                $imgData[]=$filename;
            }
            $gallery=clients::find($id);
            $gallery->title=$request->get('title');
            $gallery->img=$filename;
            $gallery->status=$status;
            $gallery->update();
            $files->move('backend/image/',$filename);
        }
        else
        {
            $gallery=clients::find($id);
            $gallery->title=$request->get('title');
            $gallery->status=$status;
            $gallery->update();
        }
        return redirect('/client_details');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery=clients::find($id);
        $gallery->delete();
        return redirect('/client_details');
    }
}
