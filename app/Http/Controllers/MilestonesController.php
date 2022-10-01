<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\milestones_achievement;
class MilestonesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about=milestones_achievement::get();
        return view('backend.milestones_achievements.display_about',compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.milestones_achievements.add_about');
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
            $about=new milestones_achievement([
                'year'=>$name,
                'description'=>$desc,
                'img'=>$filename
            ]);
            $about->save();
            $files->move('backend/image/',$filename);
        }
        
        return redirect('/milestones_achievements');
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
        $about=milestones_achievement::find($id);
        return view('backend.milestones_achievements.update_about',compact('about'));
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
            $about=milestones_achievement::find($id);
            $about->year=$name;
            $about->description=$desc;
            $about->img=$filename;
            $about->update();
            $files->move('backend/image/',$filename);
        }
        else
        {
            $about=milestones_achievement::find($id);
            $about->year=$name;
            $about->description=$desc;
            $about->update();
        }
        return redirect('/milestones_achievements');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about=milestones_achievement::find($id);
        $about->delete();
        return redirect('/milestones_achievements');
    }
}
