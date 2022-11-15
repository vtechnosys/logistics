<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_service;
use App\Models\tbl_contact;
use DB;
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
        return view('backend.service.display_service',compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.service.add_service');
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
                'short_description'=>$request->get('short_desc'),
                'image'=>$filename,
                'status'=>'active'
            ]);
            $about->save();
            $files->move('backend/image/',$filename);
        }
        else
        {
            $about=new tbl_service([
                'name'=>$name,
                'description'=>$desc,
                'short_description'=>$request->get('short_desc'),
                'status'=>'active'
            ]);
            $about->save();
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
        $about=tbl_service::find($id);
        return view('backend.service.show_service',compact('about'));
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
        return view('backend.service.update_service',compact('about'));
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
            $about->short_description=$request->get('short_desc');
            $about->description=$desc;
            $about->image=$filename;
            $about->update();
            $files->move('backend/image/',$filename);
        }
        else
        {
            $about=tbl_service::find($id);
            $about->name=$name;
            $about->short_description=$request->get('short_desc');
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
    public function contact_details()
    {
        $contact=DB::table('tbl_contacts')
                    ->join('tbl_services','tbl_services.id','=','tbl_contacts.enquire_for')
                    ->select('*','tbl_contacts.id as cid','tbl_services.name as sname','tbl_contacts.name as cname')
                    ->get();
        return view('backend.contact_details',compact('contact'));
    }
    public function contact_remove($id)
    {
        $contact=tbl_contact::find($id);
        $contact->delete();
        return redirect('/contact_details');
    }
}
