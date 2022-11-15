<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\career;
use App\Models\celebration;
use App\Models\client;
use App\Models\enquire;
use App\Models\envisioning_future;
use App\Models\management;
use App\Models\milestones_achievement;
use App\Models\overview;
use App\Models\tbl_about;
use App\Models\tbl_contact;
use App\Models\tbl_gallery;
use App\Models\tbl_service;
use App\Models\testimonial;
use App\Models\vision_mission;
use DB;
class FrontController extends Controller
{
    public function indexpage()
    {
        
        $about=tbl_about::first();
        $client=DB::table('clients')
                ->select('*')
                ->get();
        $service=DB::table('tbl_services')
                ->where('status','=','active')
                ->select('*')
                ->get();
        $testi=DB::table('testimonials')
                ->select('*')
                ->get();
        return view('frontend.index',compact('about','client','service','testi'));
    }
    public function aboutpage()
    {
        return view('frontend.about');
    }
    public function servicepage()
    {
        $serv=DB::table('tbl_services')
                ->select('*')
                ->get();
        $testi=DB::table('testimonials')
                ->select('*')
                ->get();
        return view('frontend.service',compact('testi','serv'));
    }
    public function service_details($id)
    {
        $str=str_replace('-',' ',$id);
        $serv=DB::table('tbl_services')
                ->where('name','=',$str)
                ->select('*')
                ->first();
        return view('frontend.service_details',compact('serv'));
    }
    public function gallery()
    {
        $gallery=DB::table('tbl_galleries')
                    ->select('*')
                    ->get();
        return view('frontend.gallery',compact('gallery'));
    }
    public function people_corner()
    {
        $people=DB::table('careers')
                    ->select('*')
                    ->get();
        return view('frontend.career',compact('people'));
    }
    public function about_ALS()
    {
        $about_als=tbl_about::get();
        return view('frontend.about_ALS',compact('about_als'));
    }
    public function management()
    {
        $management=management::get();
        return view('frontend.management',compact('management'));
    }
    public function vision_mission()
    {
        $vision_mission=vision_mission::get();
        return view('frontend.vision_mission',compact('vision_mission'));
    }
    public function envisioning_the_future()
    {
        $envisioning_the_future=envisioning_future::get();
        return view('frontend.envisioning_futures',compact('envisioning_the_future'));
    }
    public function milestones_achievements()
    {
        $milestones=milestones_achievement::get();
        return view('frontend.milestones_achievements',compact('milestones'));
    }
    public function contact()
    {
        $serv=DB::table('tbl_services')
                ->select('*')
                ->get();
        return view('frontend.contact',compact('serv'));
    }
    public function contactstore(Request $request)
    {
        $name=$request->get('name');
        $email=$request->get('email');
        $phone=$request->get('phone');
        $cname=$request->get('cname');
        $service=$request->get('service');
        $message=$request->get('message');
        $contact=new tbl_contact([
            'name'=>$name,
            'email'=>$email,
            'phone'=>$phone,
            'company_name'=>$cname,
            'message'=>$message,
            'enquire_for'=>$service
        ]);
        $contact->save();
        echo "<script>alert('Thank You')</script>";
        echo "<script>window.location.href='/contact'</script>";
    }
    public function search(Request $request)
    {
        $name=$request->get('sname');
        $serv=DB::table('tbl_services')
                ->where('name','like','%'.$name.'%')
                ->select()
                ->count();
        if($serv>0)
        {
            $serv=DB::table('tbl_services')
                ->where('name','like','%'.$name.'%')
                ->select()
                ->get();
            return view('frontend.search_service',compact('serv'));
        }
        else
        {
            return view('frontend.search_service_empty');
        }
        
    }
}
