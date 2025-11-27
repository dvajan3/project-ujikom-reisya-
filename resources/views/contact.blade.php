@extends('layouts.app')

@section('title', 'Contact - Reisya Majalah')

@section('content')
<!-- Contact form Start -->
<div class="contact-form-main">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-7 col-md-9">
                <div class="form-wrapper">
                    <!--Section Tittle  -->
                    <div class="form-tittle">
                        <div class="row ">
                            <div class="col-lg-11 col-md-10 col-sm-10">
                                <div class="section-tittle">
                                    <h2>Contact Us</h2>
                                    <p>Get in touch with our team. We'd love to hear from you!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Section Tittle  -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <form id="contact-form" action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-box user-icon mb-30">
                                    <input type="text" name="name" placeholder="Name" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-box email-icon mb-30">
                                    <input type="email" name="email" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-box subject-icon mb-30">
                                    <input type="text" name="subject" placeholder="Subject" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-box subject-icon mb-30">
                                    <input type="text" name="phone" placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-box message-icon mb-65">
                                    <textarea name="message" id="message" placeholder="Message" required></textarea>
                                </div>
                                <div class="submit-info">
                                    <button class="btn" type="submit">Send Message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact form End -->

<!-- Contact Info Start -->
<div class="contact-info-area pt-70 pb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single-contact-info mb-30">
                    <div class="contact-info-icon">
                        <span class="flaticon-phone-call"></span>
                    </div>
                    <div class="contact-info-content">
                        <h4>Phone</h4>
                        <p>+62 123 456 789</p>
                        <p>+62 987 654 321</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-contact-info mb-30">
                    <div class="contact-info-icon">
                        <span class="flaticon-email"></span>
                    </div>
                    <div class="contact-info-content">
                        <h4>Email</h4>
                        <p>info@reisyamajalah.com</p>
                        <p>contact@reisyamajalah.com</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-contact-info mb-30">
                    <div class="contact-info-icon">
                        <span class="flaticon-location"></span>
                    </div>
                    <div class="contact-info-content">
                        <h4>Address</h4>
                        <p>Jl. Contoh No. 123</p>
                        <p>Jakarta, Indonesia</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact Info End -->
@endsection