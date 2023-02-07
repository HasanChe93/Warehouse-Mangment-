@extends('pages.master.master')
@section('content')
    <div class="my-5 mx-2">
        <h2>Terms & Condition</h2>
        <li> Introduction: These Terms and Conditions (“T&C”) govern your use of our Warehouse Website (“Website”). By
            accessing or using the Website, you agree to be bound by these T&C and our Privacy Policy. If you do not agree
            to these T&C, please do not use the Website.</li>

        <li> Use of Website: The Website is intended for personal use only. You may not use the Website for commercial
            purposes or in a way that is illegal or damaging to us or to any third party.</li>

        <li> Products and Services: The products and services available on the Website are subject to change without notice.
            We do not guarantee that the products and services advertised on the Website will be available or will meet your
            requirements.</li>

        <li> User Content: You are solely responsible for any content that you upload, post or otherwise transmit via the
            Website (“User Content”). You represent and warrant that you have all rights necessary to upload, post or
            transmit User Content and that such User Content does not infringe any third party rights.</li>

        <li> Intellectual Property: The Website and its content, including but not limited to text, software, graphics,
            images, and other material, are protected by copyright and other intellectual property laws. You may not use the
            Website or its content in a manner that exceeds the rights granted to you under these T&C.</li>

        <li> Disclaimers: The Website and its content are provided “as is” and without warranties of any kind, either
            express or implied. We do not guarantee the accuracy, completeness, or reliability of the Website or its
            content.</li>

    </div>
    <div class="container newsletter mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="row justify-content-center">
            <div class="col-lg-10 border rounded p-1">
                <div class="border rounded text-center p-1">
                    <div class="bg-white rounded text-center p-5">
                        <h4 class="mb-4">Subscribe Our <span class="text-primary text-uppercase">Newsletter</span></h4>
                        <div class="position-relative mx-auto" style="max-width: 400px;">
                            <form method="post" action="{{ route('email.store') }}" enctype="multipart/form-data">
                                @csrf
                                <input class="form-control w-100 py-3 ps-4 pe-5" type="text" name="email"
                                    placeholder="Enter your email">
                                <button type="submit"
                                    class="btn btn-primary py-2 px-3 position-absolute top-0 end-0 mt-2 me-2">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
