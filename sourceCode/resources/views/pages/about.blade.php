@extends('pages.master.master')
@section('content')
    <!-- Header End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-1.jpg);">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">About Us</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('about') }}">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">About</li>
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
                    <h4 class=" mb-4 text-center text-primary text-uppercase "> Our success is not defined by the boundaries
                        set by others, but by the ones we set for ourselves,<br>
                        It Matters Where You INVEST.</h4>

                </div>
            </div>
        </div>
    </div>
    <!-- Booking End -->



    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-7">
                    <h6 class="section-title text-start text-primary text-uppercase">About Us</h6>
                    <h1 class="mb-4">Welcome to <span class="text-primary text-uppercase">ADEN WAREHOUSE </span></h1>
                    <p class="mb-4">Our Warehouse is dedicated to providing our customers with only the highest quality
                        products. We understand the importance of authenticity and that's why we take great care in sourcing
                        and verifying the authenticity of all our products.</br>Our Team of experts thoroughly inspects each
                        and every product before it
                        reaches our warehouse, to ensure that it meets our strict quality standards. We work with reputable
                        suppliers and manufacturers to ensure that our products are genuine and meet the highest standards
                        of quality.

                    </p>
                    <div class="row g-3 pb-4">
                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.1s">
                            <div class="border rounded p-1">
                                <div class="border rounded text-center p-4">
                                    <i class="fa-solid fa-gift fa-2x text-primary mb-2"></i>
                                    <h2 class="mb-1" data-toggle="counter-up">{{ DB::table('products')->count() }}</h2>
                                    <p class="mb-0">Products</p>
                                </div>
                            </div>
                        </div>



                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.3s">
                            <div class="border rounded p-1">
                                <div class="border rounded text-center p-4">
                                    <i class="fa fa-users-cog fa-2x text-primary mb-2"></i>

                                    <h2 class="mb-1" data-toggle="counter-up">
                                        {{ DB::table('users')->where('role', 'employee')->count() }}
                                    </h2>
                                    <p class="mb-0">Staffs</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.5s">
                            <div class="border rounded p-1">
                                <div class="border rounded text-center p-4">
                                    <i class="fa fa-users fa-2x text-primary mb-2"></i>
                                    <h2 class="mb-1" data-toggle="counter-up">
                                        {{ DB::table('users')->where('role', 'user')->count() }}</h2>
                                    {{-- DB::table('users')
                                    ->whereNotIn('role', ['admin', 'employee', 'shipper']) --}}
                                    <p class="mb-0">Clients</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="img/about-1.jpg"
                                style="margin-top: 25%;">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.3s" src="img/about-2.jpg">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-50 wow zoomIn" data-wow-delay="0.5s" src="img/about-3.jpg">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.7s" src="img/about-4.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->



    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Our Team</h6>
                <h1 class="mb-5">Explore Our <span class="text-primary text-uppercase">Staffs</span></h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="rounded shadow overflow-hidden">
                        <div class="position-relative">
                            <img class="img-fluid" src="img/team-2.jpg" alt="">
                            <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                <a class="btn btn-square btn-primary mx-1" target="_blank"
                                    href="https://www.facebook.com//"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" target="_blank"
                                    href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-square btn-primary mx-1" target="_blank"
                                    href="https://www.linkedin.com/"><i
                                        class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4 mt-3">
                            <h5 class="fw-bold mb-0">Lionel Benoucci</h5>
                            <small>CEO </small>
                        </div>
                    </div>
                </div>
             
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="rounded shadow overflow-hidden">
                        <div class="position-relative">
                            <img class="img-fluid" src="img/team-2.jpg" alt="">
                            <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                <a class="btn btn-square btn-primary mx-1" target="_blank"
                                    href="https://www.facebook.com//"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" target="_blank"
                                    href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-square btn-primary mx-1" target="_blank"
                                    href="https://www.linkedin.com/"><i
                                        class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4 mt-3">
                            <h5 class="fw-bold mb-0">Alvarz Benoucci</h5>
                            <small>COO</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="rounded shadow overflow-hidden">
                        <div class="position-relative">
                            <img class="img-fluid" src="img/team-2.jpg" alt="">
                            <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                <a class="btn btn-square btn-primary mx-1" target="_blank"
                                    href="https://www.facebook.com//"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" target="_blank"
                                    href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-square btn-primary mx-1" target="_blank"
                                    href="https://www.linkedin.com/"><i
                                        class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4 mt-3">
                            <h5 class="fw-bold mb-0">Ronald Bounocci</h5>
                            <small>CTO </small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="rounded shadow overflow-hidden">
                        <div class="position-relative">
                            <img class="img-fluid" src="img/team-2.jpg" alt="">
                            <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                <a class="btn btn-square btn-primary mx-1" target="_blank"
                                    href="https://www.facebook.com//"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" target="_blank"
                                    href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-square btn-primary mx-1" target="_blank"
                                    href="https://www.linkedin.com/"><i
                                        class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4 mt-3">
                            <h5 class="fw-bold mb-0">Monir Bellucii</h5>
                            <small>CFO</small>
                        </div>
                    </div>
                </div>





              

             


              


               



             
















            </div>
        </div>
    </div>
    <!-- Team End -->












    <!-- Newsletter Start -->
    <div class="container newsletter mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container newsletter mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="row justify-content-center">
                <div class="col-lg-10 border rounded p-1">
                    <div class="border rounded text-center p-1">
                        <div class="bg-white rounded text-center p-5">
                            <h4 class="mb-4">For more information please <span
                                    class="text-primary text-uppercase">Contact US</span></h4>
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
