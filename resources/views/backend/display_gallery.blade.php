@extends('backend.header')
@section('content')

                    <!-- content starts -->
                    <div class="main-content">
                        <!-- Begin Page Content -->
                        <div class="container-fluid px-lg-4">
                            <div class="row">
                                <div class="col-md-6 mt-lg-4 mt-4">
                                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                        <h1 class="h3 mb-0 text-gray-800" style="margin-top:4%;margin-left:3%;">Gallery Details</h1>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-lg-4 mt-4">
                                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                      <a href="gallery_details/create" style="margin-top:4%;"><button class="btn btn-primary" >Add Gallery</button></a>
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
                                                                        <th>Image</th>
                                                                        <!-- <th>Status</th> -->
                                                                        <th>Delete</th>
                                                                        <th>Update</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($about as $a)
                                                                    <tr>
                                                                        <td>{{$a->id}}</td>
                                                                        <td><img src="{{asset('backend/image')}}/{{$a->image}}" height="50px" width="100px"></td>
                                                                        <!-- <td>{{$a->status}}</td> -->
                                                                        <td><form action="{{route('gallery_details.destroy',$a->id)}}" method="post">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button class="btn btn-danger">Delete</button>
                                                                        </form></td>
                                                                        <td><a href="{{route('gallery_details.edit',$a->id)}}"><button class="btn btn-primary">Update</button></a></td>
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