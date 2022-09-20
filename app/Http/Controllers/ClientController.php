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
        return view('backend.display_client',compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.add_client');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file=$request->hasfile('file');
        if($file)
        {
            $files=$request->file('file');
            $filename=$files->getClientOriginalName();
            $gallery=new clients([
                'img'=>$filename,
                'status'=>'active'
            ]);
            $gallery->save();
            $files->move('backend/image/',$filename);
        }  
        return redirect('/valuable_client'); 
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
        return view('backend.update_client',compact('gallery'));
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
            $files=$request->file('file');
            $filename=$files->getClientOriginalName();
            $gallery=clients::find($id);
            $gallery->img=$filename;
            $gallery->status=$status;
            $gallery->update();
            $files->move('backend/image/',$filename);
        }
        else
        {
            $gallery=clients::find($id);
            
            $gallery->status=$status;
            $gallery->update();
        }
        return redirect('/valuable_client');
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
        return redirect('/valuable_client');
    }
}
