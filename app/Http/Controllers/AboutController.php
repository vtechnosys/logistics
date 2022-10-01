<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_about;
class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about=tbl_about::get();
        return view('backend.about.display_about',compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.about.add_about');
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
            $about=new tbl_about([
                'name'=>$name,
                'description'=>$desc,
                'img'=>$filename
            ]);
            $about->save();
            $files->move('backend/image/',$filename);
        }
        
        return redirect('/about_details');
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
        $about=tbl_about::find($id);
        return view('backend.about.update_about',compact('about'));
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
            $about=tbl_about::find($id);
            $about->name=$name;
            $about->description=$desc;
            $about->img=$filename;
            $about->update();
            $files->move('backend/image/',$filename);
        }
        else
        {
            $about=tbl_about::find($id);
            $about->name=$name;
            $about->description=$desc;
            $about->update();
        }
        return redirect('/about_details');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about=tbl_about::find($id);
        $about->delete();
        return redirect('/about_details');
    }
}
