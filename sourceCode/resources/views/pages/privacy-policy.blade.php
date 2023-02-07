@extends('pages.master.master')
@section('content')
    <div class="my-5 mx-2">
        <h2>Privacy Policy</h2>
        <ul>
            <li>
                <h4> Introduction:</h4>
                <p>This Privacy Policy (“Policy”) describes how we collect, use, and disclose
                    personal information when you use our Warehouse Website (“Website”). By using the Website, you agree to
                    the terms of this Policy.</p>

            <li>
                <h4> Information Collection:</h4>
                <p>We collect personal information when you create an account on the
                    Website, place an order, or otherwise interact with the Website. The personal information we collect may
                    include your name, email address, mailing address, phone number, payment information, and other
                    information you provide to us.</p>

            <li>
                <h4> Use of Personal Information:</h4>
                <p> We use the personal information we collect to provide you with the
                    products and services available through the Website, to improve the Website and our services, to
                    communicate with you, and for other purposes described in this Policy.</p>
            <li>
                <h4> Sharing of Personal Information:</h4>
                <p> We do not sell or rent your personal information to third
                    parties. We may share your personal information with our affiliates and service providers for the
                    purpose of providing you with the products and services available through the Website. We may also
                    disclose your personal information as required by law or in response to a valid request from a law
                    enforcement or governmental authority.</p>

            <li>
                <h4> Security of Personal Information:</h4>
                <p> We take reasonable measures to protect the security of the
                    personal information we collect, including the use of encryption technology. However, no website or
                    internet transmission is completely secure, and we cannot guarantee the security of your personal
                    information.</p>

            <li>
                <h4> Changes to this Policy:</h4>
                <p>We may modify this Policy from time to time. We will provide notice of
                    any material changes to this Policy by posting the updated Policy on the Website. Your continued use of
                    the Website following the posting of any changes to this Policy constitutes your acceptance of the
                    changes.
                </p>
            <li>
                <h4> Contact Us:</h4>
                <p>If you have any questions or concerns about this Policy or our treatment of your
                    personal information, please contact us.</p>

        </ul>

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

