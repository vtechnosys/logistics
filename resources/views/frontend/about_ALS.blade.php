@extends('frontend.header')
@section('content')
<!-- Header Start -->
<div class="jumbotron jumbotron-fluid mb-5">
    <div class="container text-center py-5">
        <!-- <h1 class="text-primary mb-4">Safe & Faster</h1> -->
        <h1 class="text-white display-3 mb-5">About ALS</h1>
        <div class="mx-auto" style="width: 100%; max-width: 600px;">
            <!-- <div class="input-group">
                <input type="text" class="form-control border-light" style="padding: 30px;" placeholder="Tracking Id">
                <div class="input-group-append">
                    <button class="btn btn-primary px-3">Track & Trace</button>
                </div>
            </div> -->
        </div>
    </div>
</div>
<!-- Header End -->


<!-- About Start -->
<div class="container-fluid py-5">
    <div class="container">
        @foreach($about_als as $about)
        <div class="row align-items-center">
            <div class="col-lg-5 pb-4 pb-lg-0">
                <img class="img-fluid w-100" src="{{asset('backend/image')}}/{{$about->img}}" alt="">
            </div>
            <div class="col-lg-7">
                <h6 class="text-primary text-uppercase font-weight-bold">{{$about->name}}</h6>
                <!-- <h1 class="mb-4">Trusted & Faster Logistic Service Provider</h1> -->
                <p class="mb-4">{{$about->description}}</p>
            </div>
        </div>
        @endforeach
    </div>
    <!-- Video Modal -->
    <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>        
                    <!-- 16:9 aspect ratio -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->













@endsection