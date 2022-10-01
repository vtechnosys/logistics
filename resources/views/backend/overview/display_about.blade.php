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
                                      <a href="overview_details/create" style="margin-top:4%;"><button class="btn btn-primary" >Add Overview Details</button></a>
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
                                                                <thead>
                                                                    <tr>
                                                                        <th>Id</th>
                                                                        <th>Name</th>
                                                                        <th>Description</th>
                                                                        <th>Image</th>
                                                                        <th>Actions</th>
                                                                        <!-- <th>Update</th>
                                                                        <th>View</th> -->
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($about as $a)
                                                                    <?php
                                                                    $desc=$a->description;
                                                                    $str=substr($desc,0,200);
                                                                    ?>
                                                                    <tr>
                                                                        <td>{{$a->id}}</td>
                                                                        <td>{{$a->name}}</td>
                                                                        <td>{!! $str !!}...</td>
                                                                        <td><img src="{{asset('backend/image')}}/{{$a->img}}" height="50px" width="100px"></td>
                                                                        <td>
                                                                        <a href="{{route('overview_details.edit',$a->id)}}"><button class="btn btn-info">Update</button></a><br>
                                                                        <a href="{{route('overview_details.show',$a->id)}}"><button class="btn btn-success mt-2">Show</button></a>
                                                                        <form action="{{route('overview_details.destroy',$a->id)}}" method="post" style="margin-top:10%;">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button class="btn btn-danger">Delete</button>
                                                                        </form></td>
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                                <!-- <tfoot>
                                                                    <tr>
                                                                        <th>Name</th>
                                                                        <th>Position</th>
                                                                        <th>Office</th>
                                                                        <th>Age</th>
                                                                        <th>Start date</th>
                                                                        <th>Salary</th>
                                                                    </tr>
                                                                </tfoot> -->
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