<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_service;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about=tbl_service::get();
        return view('backend.display_service',compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.add_service');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name=$request->get('name');
        
        $desc=$request->get('desc');
        
        $file=$request->hasfile('file');
        if($file)
        {   
            $files=$request->file('file');
            $filename=$files->getClientOriginalName();
            $about=new tbl_service([
                'name'=>$name,
                'description'=>$desc,
                'image'=>$filename,
                'status'=>'active'
            ]);
            $about->save();
            $files->move('backend/image/',$filename);
        }
        
        return redirect('/service_details');
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
        $about=tbl_service::find($id);
        return view('backend.update_service',compact('about'));
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
        $name=$request->get('name');
        $desc=$request->get('desc');
        $file=$request->hasfile('file');
        if($file)
        {
            $files=$request->file('file');
            $filename=$files->getClientOriginalName();
            $about=tbl_service::find($id);
            $about->name=$name;
            $about->description=$desc;
            $about->image=$filename;
            $about->update();
            $files->move('backend/image/',$filename);
        }
        else
        {
            $about=tbl_service::find($id);
            $about->name=$name;
            $about->description=$desc;
            $about->update();
        }
        return redirect('/service_details');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ser=tbl_service::find($id);
        $ser->delete();
        return redirect('/service_details');
    }
}
