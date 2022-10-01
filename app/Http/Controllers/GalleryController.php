<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_gallery;
class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about=tbl_gallery::get();
        return view('backend.gallery.display_gallery',compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.gallery.add_gallery');
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
            $gallery=new tbl_gallery([
                'image'=>$filename,
                'status'=>'active'
            ]);
            $gallery->save();
            $files->move('backend/image/',$filename);
        }  
        return redirect('/gallery_details'); 
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
        $gallery=tbl_gallery::find($id);
        return view('backend.gallery.update_galler',compact('gallery'));
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
            $gallery=tbl_gallery::find($id);
            $gallery->image=$filename;
            $gallery->status=$status;
            $gallery->update();
            $files->move('backend/image/',$filename);
        }
        else
        {
            $gallery=tbl_gallery::find($id);
            
            $gallery->status=$status;
            $gallery->update();
        }
        return redirect('/gallery_details');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery=tbl_gallery::find($id);
        $gallery->delete();
        return redirect('/gallery_details');
    }
}
