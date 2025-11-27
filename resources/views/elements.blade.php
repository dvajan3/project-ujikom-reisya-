@extends('layouts.app')

@section('title', 'Elements - Reisya Majalah')

@section('content')
<!-- Elements Area Start -->
<section class="elements-area pt-80 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle text-center mb-50">
                    <h3>UI Elements</h3>
                    <p>Various UI components and elements used in our magazine</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="elements-item mb-30">
                    <h4>News Cards</h4>
                    <div class="single-what-news mb-30">
                        <div class="what-img">
                            <img src="{{ asset('assets/img/blog/single_blog_1.png') }}" alt="">
                        </div>
                        <div class="what-cap">
                            <span class="color1">Technology</span>
                            <h4><a href="#">Sample News Title</a></h4>
                            <p>This is a sample news description to show how news cards look.</p>
                            <span>by Editor - Dec 15, 2024</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="elements-item mb-30">
                    <h4>Social Follow</h4>
                    <div class="single-follow">
                        <div class="single-box">
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                </div>
                                <div class="follow-count">  
                                    <span>8,045</span>
                                    <p>Fans</p>
                                </div>
                            </div> 
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                </div>
                                <div class="follow-count">
                                    <span>8,045</span>
                                    <p>Fans</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="elements-item mb-30">
                    <h4>Category Tags</h4>
                    <div class="category-tags">
                        <span class="color1">Technology</span>
                        <span class="color2">Fashion</span>
                        <span class="color3">Travel</span>
                        <span class="color4">Health</span>
                        <span class="bgr">Business</span>
                        <span class="bgb">Sports</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="elements-item mb-30">
                    <h4>Sample Images</h4>
                    <img src="{{ asset('assets/img/elements/a.jpg') }}" alt="" class="img-fluid mb-3">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="elements-item mb-30">
                    <h4>Sample Images</h4>
                    <img src="{{ asset('assets/img/elements/a2.jpg') }}" alt="" class="img-fluid mb-3">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="elements-item mb-30">
                    <h4>Sample Images</h4>
                    <img src="{{ asset('assets/img/elements/d.jpg') }}" alt="" class="img-fluid mb-3">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Elements Area End -->
@endsection