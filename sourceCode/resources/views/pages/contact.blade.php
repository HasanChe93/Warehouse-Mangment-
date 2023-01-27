@extends('pages.master.master')
@section('content')
    <!-- Header End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-1.jpg);">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Contact</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Contact</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Booking Start -->
    {{-- <div class="container-fluid booking pb-5 wow fadeIn " data-wow-delay="0.1s">
        <div class="container ">
            <div class="bg-white shadow-lg " style="padding: 35px;">
                <div class="row g-2">
                    <h4 class=" mb-4 text-center text-primary text-uppercase ">We Are Always Here To Assist,<br>
                        Please Do Not Hesitate To Contact Us</h4>

                </div>
            </div>
        </div>
    </div> --}}
    <!-- Booking End -->


    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="col-4">
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success text-center">
                    {{ $message }}
                </div>
            @endif
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Contact Us</h6>
                <h1 class="mb-5"><span class="text-primary text-uppercase">Contact</span> For Any Query</h1>
            </div>
            <div class="row g-4">
                <div class="col-12">
                    <div class="row gy-4">
                        <div class="col-md-4">
                            <h6 class="section-title text-start text-primary text-uppercase">General</h6>
                            <p><i class="fa fa-envelope-open text-primary me-2"></i>info@Aden-WH.com</p>
                        </div>
                        <div class="col-md-4">
                            <h6 class="section-title text-start text-primary text-uppercase">Accounting</h6>
                            <p><i class="fa fa-envelope-open text-primary me-2"></i>info.Acc@Aden-WH.com</p>
                        </div>

                        <div class="col-md-4">
                            <h6 class="section-title text-start text-primary text-uppercase">Technical</h6>
                            <p><i class="fa fa-envelope-open text-primary me-2"></i>tech@Aden-WH.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12808.911482116515!2d35.967396377744556!3d31.752969717476514!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb81053c8c40f02b2!2z2YXYs9iq2YjYr9i52KfYqiDYr9in2LEg2KfZhNmF2YbZh9mE!5e0!3m2!1sen!2sjo!4v1674284441544!5m2!1sen!2sjo"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>

                </div>
                <div class="col-md-6">
                    <div class="wow fadeInUp" data-wow-delay="0.2s">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="post" action="{{ route('contactus.store') }}">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input name="name" type="text" class="form-control" id="name"
                                            placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input name="email" type="email" class="form-control" id="email"
                                            placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input name="subject" type="text" class="form-control" id="subject"
                                            placeholder="Subject">
                                        <label for="subject">Subject</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea name="message" class="form-control" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <div class="container newsletter mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="row justify-content-center">
            <div class="col-lg-10 border rounded p-1">
                <div class="border rounded text-center p-1">
                    <div class="bg-white rounded text-center p-5">
                        <h4 class="mb-4">We are here to help If you have any enquiries, you can fill out the form to the
                            right or use the contact details below. <span class="text-primary text-uppercase"> to get in
                                touch</span></h4>
                        <div class="position-relative mx-auto" style="max-width: 400px;">


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Footer Start -->
@endsection
