<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\career;
class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about=career::get();
        return view('backend.career.display_about',compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.career.add_about');
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
            $about=new career([
                'name'=>$name,
                'description'=>$desc,
                'img'=>$filename
            ]);
            $about->save();
            $files->move('backend/image/',$filename);
        }
        
        return redirect('/career_details');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $about=career::find($id);
        return view('backend.career.view_about',compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about=career::find($id);
        return view('backend.career.update_about',compact('about'));
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
            $about=career::find($id);
            $about->name=$name;
            $about->description=$desc;
            $about->img=$filename;
            $about->update();
            $files->move('backend/image/',$filename);
        }
        else
        {
            $about=career::find($id);
            $about->name=$name;
            $about->description=$desc;
            $about->update();
        }
        return redirect('/career');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about=career::find($id);
        $about->delete();
        return redirect('/career');
    }
}
