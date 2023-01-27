@extends('pages.master.master')
@section('content')
    <!-- Header End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-1.jpg);">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Services</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Services</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Booking Start -->
    <div class="container-fluid booking pb-5 wow fadeIn " data-wow-delay="0.1s">
        <div class="container ">
            <div class="bg-white shadow-lg " style="padding: 35px;">
                <div class="row g-2">
                    <h4 class=" mb-4 text-center text-primary text-uppercase "> When a getaway is number one on your wish
                        list,<br>
                        It Matters Where You Stay.</h4>

                </div>
            </div>
        </div>
    </div>
    <!-- Booking End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div id="more" class="container-fluid">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Our Services</h6>
                <h1 class="mb-5">Explore Our <span class="text-primary text-uppercase">Services</span></h1>
            </div>
            <div class="row" style="justify-content: space-around">


        
                    <a class="col-lg-3 col-md-5 service-item rounded" href="{{ route('room') }}">
                        <img src="img/pl2.png" class="card-img-top" alt="...">

                        <h5 class="mb-3">Rooms & Appartment</h5>
                        <p class="text-body mb-0">It's going to be a great night… Now book yourself a great room, with
                            blackhours.com. Find top hotel deals for all occasions. Tonight, or any night.
                        </p>

                    </a>


          
      
                    <a class="col-lg-3 col-md-5 service-item rounded" href="{{ route('room') }}">
                        <img src="img/pl2.png" class="card-img-top" alt="...">

                        <h5 class="mb-3">Rooms & Appartment</h5>
                        <p class="text-body mb-0">It's going to be a great night… Now book yourself a great room, with
                            blackhours.com. Find top hotel deals for all occasions. Tonight, or any night.
                        </p>

                    </a>


            
          
                    <a class="col-lg-3 col-md-5 service-item rounded" href="{{ route('room') }}">
                        <img src="img/pl2.png" class="card-img-top" alt="...">

                        <h5 class="mb-3">Rooms & Appartment</h5>
                        <p class="text-body mb-0">It's going to be a great night… Now book yourself a great room, with
                            blackhours.com. Find top hotel deals for all occasions. Tonight, or any night.
                        </p>

                    </a>







            </div>

        </div>
    </div>

    <!-- Service End -->



    <?php $array = DB::table('reviews')->get(); ?>

    <!-- Testimonial Start -->
    <div>
        <br><br><br>
        <div id="testimonial" class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title text-center text-primary text-uppercase">Testimonial</h6>
            <h1 class="mb-5">Our Customers <span class="text-primary text-uppercase">Reviews</span></h1>
        </div>
    </div>


    <div class="container-xxl testimonial my-5 py-5 bg-dark wow zoomIn" data-wow-delay="0.1s">

        <div class="container">


            <div class="owl-carousel testimonial-carousel py-5">

                @foreach ($array as $item)
                    <div class="testimonial-item position-relative bg-white rounded overflow-hidden">

                        <p>{{ $item->Review }}</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-1.jpg"
                                style="width: 45px; height: 45px;">
                            <div class="ps-3">
                                <h6 class="fw-bold mb-1">{{ $item->name }}</h6>
                                <small>Customer</small>
                            </div>
                        </div>

                        <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>

                    </div>
                @endforeach

            </div>

        </div>

    </div>



    <!-- Testimonial End -->



    <!-- Newsletter Start -->
    <div class="container newsletter mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container newsletter mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="row justify-content-center">
                <div class="col-lg-10 border rounded p-1">
                    <div class="border rounded text-center p-1">
                        <div class="bg-white rounded text-center p-5">
                            <h4 class="mb-4">For more information please <span class="text-primary text-uppercase">Contact
                                    US</span></h4>
                            <div class="position-relative mx-auto" style="max-width: 400px;">

                                <a type="button" href="{{ route('contactus.index') }}"
                                    class="btn btn-primary py-2 px-3 position-center absolute top-0 end-0 mt-2 me-2">Contact
                                    US</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Newsletter Start -->


    <!-- Footer Start -->
@endsection
