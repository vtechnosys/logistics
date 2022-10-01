@extends('backend.header')
@section('content')

                    <!-- content starts -->
                    <div class="main-content">
                        <!-- Begin Page Content -->
                        <div class="container-fluid px-lg-4">
                            <div class="row">
                                <div class="col-md-6 mt-lg-4 mt-4">
                                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                        <h1 class="h3 mb-0 text-gray-800" style="margin-top:4%;margin-left:3%;">Overview Details</h1>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-lg-4 mt-4">
                                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                      <!-- <a href="overview_details/create" style="margin-top:4%;"><button class="btn btn-primary" >Add Overview Details</button></a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Begin Page Content -->


                    </div>
                    <!-- content Ends -->
                    <div class="main-content pt-0">
                        <div class="inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-12">
                                                <div class="white_card card_height_100 mb_30">
                                                    <div class="white_card_body pt-3">
                                                        <div class="QA_section">
                                                            <table id="example" class="display" style="width:100%">
                                                            <?php
                                                            $desc=$about->description;
                                                            ?>
                                                                    <tr>
                                                                        <th>Id</th>
                                                                        <td>{{$about->id}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Name</th>
                                                                        <td>{{$about->name}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                    <th>Image</th>
                                                                    <td><img src="{{asset('backend/image')}}/{{$about->img}}" height="50px" width="100px"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Description</th>
                                                                        
                                                                        
                                                                        <td>{!! $desc !!}</td>
                                                                      
                                                                    </tr>
                                                                    
                                                                
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->


    @endsection