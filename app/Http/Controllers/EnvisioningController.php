<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\envisioning_future;
class EnvisioningController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about=envisioning_future::get();
        return view('backend.envisioning.display_about',compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.envisioning.add_about');
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
            $about=new envisioning_future([
                'title'=>$name,
                'description'=>$desc,
                'img'=>$filename
            ]);
            $about->save();
            $files->move('backend/image/',$filename);
        }
        
        return redirect('/envisioning_details');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $about=envisioning_future::find($id);
        return view('backend.envisioning.view_about',compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about=envisioning_future::find($id);
        return view('backend.envisioning.update_about',compact('about'));
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
            $about=envisioning_future::find($id);
            $about->title=$name;
            $about->description=$desc;
            $about->img=$filename;
            $about->update();
            $files->move('backend/image/',$filename);
        }
        else
        {
            $about=envisioning_future::find($id);
            $about->title=$name;
            $about->description=$desc;
            $about->update();
        }
        return redirect('/envisioning_details');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about=envisioning_future::find($id);
        $about->delete();
        return redirect('/envisioning_details');
    }
}
