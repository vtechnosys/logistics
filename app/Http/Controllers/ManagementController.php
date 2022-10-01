<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\management;
class ManagementController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about=management::get();
        return view('backend.management.display_about',compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.management.add_about');
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
            $about=new management([
                'name'=>$name,
                'post'=>$request->get('post'),
                'description'=>$desc,
                'img'=>$filename
            ]);
            $about->save();
            $files->move('backend/image/',$filename);
        }
        
        return redirect('/management_details');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $about=management::find($id);
        return view('backend.management.view_about',compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about=management::find($id);
        return view('backend.management.update_about',compact('about'));
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
            $about=management::find($id);
            $about->name=$name;
            $about->description=$desc;
            $about->post=$request->get('post');
            $about->img=$filename;
            $about->update();
            $files->move('backend/image/',$filename);
        }
        else
        {
            $about=management::find($id);
            $about->name=$name;
            $about->post=$request->get('post');
            $about->description=$desc;
            $about->update();
        }
        return redirect('/management_details');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about=management::find($id);
        $about->delete();
        return redirect('/management_details');
    }
}
