@extends('layouts.app')

@section('content')
    <!-- Trending Area Start -->
    <div class="trending-area fix pt-25 gray-bg">
        <div class="container">
            <div class="trending-main">
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Trending Top -->
                        <div class="slider-active">
                            @foreach($featuredArticles->take(3) as $article)
                            <!-- Single -->
                            <div class="single-slider">
                                <div class="trending-top mb-30">
                                    <div class="trend-top-img" style="margin-bottom: 20px; display: block;">
                                        @if($article->foto)
                                            @if(str_starts_with($article->foto, 'assets/'))
                                                <img src="{{ asset($article->foto) }}" alt="{{ $article->judul }}" style="width: 100%; height: auto; display: block; margin-bottom: 15px;">
                                            @else
                                                <img src="{{ asset('storage/' . $article->foto) }}" alt="{{ $article->judul }}" style="width: 100%; height: auto; display: block; margin-bottom: 15px;">
                                            @endif
                                        @else
                                            @php
                                                $images = ['single_blog_6.jpg', 'single_blog_7.jpg', 'single_blog_8.jpg', '2.jpg', '4.jpg', '5.jpg'];
                                                $image = $images[($loop->index) % count($images)];
                                            @endphp
                                            <img src="{{ asset('assets/img/blog/' . $image) }}" alt="{{ $article->judul }}" style="width: 100%; height: auto; display: block; margin-bottom: 15px;">
                                        @endif
                                        <div class="trend-top-cap">
                                            <span class="bgr" data-animation="fadeInUp" data-delay=".2s" data-duration="1000ms">{{ $article->category->nama_kategori ?? 'News' }}</span>
                                            <h2><a href="{{ route('blog-details', $article->id_artikel) }}" data-animation="fadeInUp" data-delay=".4s" data-duration="1000ms">{{ Str::limit($article->judul, 60) }}</a></h2>
                                            <p data-animation="fadeInUp" data-delay=".6s" data-duration="1000ms">by {{ $article->penulis }}   -   {{ $article->created_at->format('M d, Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Right content -->
                    <div class="col-lg-4">
                            <!-- Trending Top -->
                        <div class="row">
                            @foreach($featuredArticles->skip(3)->take(2) as $article)
                            <div class="col-lg-12 col-md-6 col-sm-6">
                                <div class="trending-top mb-30">
                                    <div class="trend-top-img" style="margin-bottom: 20px; display: block;">
                                        @if($article->foto)
                                            @if(str_starts_with($article->foto, 'assets/'))
                                                <img src="{{ asset($article->foto) }}" alt="{{ $article->judul }}" style="width: 100%; height: auto; display: block; margin-bottom: 15px;">
                                            @else
                                                <img src="{{ asset('storage/' . $article->foto) }}" alt="{{ $article->judul }}" style="width: 100%; height: auto; display: block; margin-bottom: 15px;">
                                            @endif
                                        @else
                                            @php
                                                $images = ['6.jpg', '7.jpg', '8.jpg', '10.jpg', '11.jpg', '12.jpg'];
                                                $image = $images[($loop->index) % count($images)];
                                            @endphp
                                            <img src="{{ asset('assets/img/blog/' . $image) }}" alt="{{ $article->judul }}" style="width: 100%; height: auto; display: block; margin-bottom: 15px;">
                                        @endif
                                        <div class="trend-top-cap trend-top-cap2">
                                            <span class="bgb">{{ $article->category->nama_kategori ?? 'NEWS' }}</span>
                                            <h2><a href="{{ route('blog-details', $article->id_artikel) }}">{{ Str::limit($article->judul, 50) }}</a></h2>
                                            <p>by {{ $article->penulis }}   -   {{ $article->created_at->format('M d, Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Trending Area End -->
    <!-- Whats New Start -->
    <section class="whats-news-area pt-50 pb-20 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                <div class="whats-news-wrapper">
                    <!-- Heading & Nav Button -->
                    <div class="row justify-content-between align-items-end mb-15">
                        <div class="col-xl-4">
                            <div class="section-tittle mb-30">
                                <h3>Berita Terbaru</h3>
                            </div>
                        </div>
                        <div class="col-xl-8 col-md-9">
                            <div class="properties__button">
                                <!--Nav Button  -->                                            
                                <nav>                                                 
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">sekolah</a>
                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">jurusan</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">pembelajaran</a>
                                    </div>
                                </nav>
                                <!--End Nav Button  -->
                            </div>
                        </div>
                    </div>
                    <!-- Tab content -->
                    <div class="row">
                        <div class="col-12">
                            <!-- Nav Card -->
                            <div class="tab-content" id="nav-tabContent">
                                <!-- card one -->
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">       
                                    <div class="row">
                                        <!-- Left Details Caption -->
                                        <div class="col-xl-6 col-lg-12">
                                            @if($latestArticles->first())
                                            <div class="whats-news-single mb-40 mb-40">
                                                <div class="whates-img" style="margin-bottom: 20px; display: block;">
                                                    @if($latestArticles->first()->foto)
                                                        @if(str_starts_with($latestArticles->first()->foto, 'assets/'))
                                                            <img src="{{ asset($latestArticles->first()->foto) }}" alt="{{ $latestArticles->first()->judul }}" style="width: 100%; height: auto; display: block; margin-bottom: 15px;">
                                                        @else
                                                            <img src="{{ asset('storage/' . $latestArticles->first()->foto) }}" alt="{{ $latestArticles->first()->judul }}" style="width: 100%; height: auto; display: block; margin-bottom: 15px;">
                                                        @endif
                                                    @else
                                                        <img src="{{ asset('assets/img/blog/14.jpg') }}" alt="{{ $latestArticles->first()->judul }}" style="width: 100%; height: auto; display: block; margin-bottom: 15px;">
                                                    @endif
                                                </div>
                                                <div class="whates-caption">
                                                    <h4><a href="{{ route('blog-details', $latestArticles->first()->id_artikel) }}">{{ Str::limit($latestArticles->first()->judul, 60) }}</a></h4>
                                                    <span>by {{ $latestArticles->first()->penulis }}   -   {{ $latestArticles->first()->created_at->format('M d, Y') }}</span>
                                                    <p>{{ Str::limit(strip_tags($latestArticles->first()->konten), 120) }}</p>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                        <!-- Right single caption -->
                                        <div class="col-xl-6 col-lg-12">
                                            <div class="row">
                                                @foreach($latestArticles->skip(1)->take(4) as $index => $article)
                                                <!-- single -->
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img" style="margin-bottom: 15px; display: block;">
                                                            @if($article->foto)
                                                                @if(str_starts_with($article->foto, 'assets/'))
                                                                    <img src="{{ asset($article->foto) }}" alt="{{ $article->judul }}" style="width: 100%; height: auto; display: block; margin-bottom: 10px;">
                                                                @else
                                                                    <img src="{{ asset('storage/' . $article->foto) }}" alt="{{ $article->judul }}" style="width: 100%; height: auto; display: block; margin-bottom: 10px;">
                                                                @endif
                                                            @else
                                                                @php
                                                                    $images = ['16.jpg', '17.jpg', '18.jpg', '19.jpg', '20.jpg', '21.jpg'];
                                                                    $image = $images[($index) % count($images)];
                                                                @endphp
                                                                <img src="{{ asset('assets/img/blog/' . $image) }}" alt="{{ $article->judul }}" style="width: 100%; height: auto; display: block; margin-bottom: 10px;">
                                                            @endif
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorb">{{ $article->category->nama_kategori ?? 'NEWS' }}</span>
                                                            <h4><a href="{{ route('blog-details', $article->id_artikel) }}">{{ Str::limit($article->judul, 50) }}</a></h4>
                                                            <p>{{ $article->created_at->format('M d, Y') }}</p> 
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card two -->
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <div class="row">
                                        <!-- Left Details Caption -->
                                        <div class="col-xl-6">
                                            <div class="whats-news-single mb-40">
                                                <div class="whates-img">
                                                    <img src="{{ asset('assets/img/elements/f5.jpg') }}" alt="">
                                                </div>
                                                <div class="whates-caption">
                                                    <h4><a href="#">Destinasi Wisata Eksotis yang Wajib Dikunjungi di Indonesia</a></h4>
                                                    <span>by Travel Writer   -   Jun 19, 2020</span>
                                                    <p>Jelajahi keindahan alam Indonesia yang memukau dengan destinasi wisata eksotis yang menawarkan pengalaman tak terlupakan bagi setiap traveler.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Right single caption -->
                                        <div class="col-xl-6 col-lg-12">
                                            <div class="row">
                                                <!-- single -->
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="{{ asset('assets/img/elements/f6.jpg') }}" alt="">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorb">TRAVEL</span>
                                                            <h4><a href="#">Tips Backpacking Hemat untuk Pemula yang Ingin Keliling Dunia</a></h4>
                                                            <p>Jun 19, 2020</p> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                    <div class="whats-right-single mb-20">
                                                        <div class="whats-right-img">
                                                            <img src="{{ asset('assets/img/elements/f7.jpg') }}" alt="">
                                                        </div>
                                                        <div class="whats-right-cap">
                                                            <span class="colorb">TRAVEL</span>
                                                            <h4><a href="#">Kuliner Khas Daerah yang Harus Dicoba Saat Traveling</a></h4>
                                                            <p>Jun 19, 2020</p> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- End Nav Card -->
                        </div>
                    </div>
                </div>
                <!-- Banner -->
                <div class="banner-one mt-20 mb-30">
                    <img src="{{ asset('assets/img/banner/ban_blog_2.jpg') }}" alt="">
                </div>
                </div>
                <div class="col-lg-4">
                    <!-- Flow Socail -->
                    <div class="single-follow mb-45">
                        <div class="single-box">
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                </div>
                                <div class="follow-count">  
                                    <span>9999+</span>
                                    <p>Fans</p>
                                </div>
                            </div> 
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                </div>
                                <div class="follow-count">
                                    <span>9999+</span>
                                    <p>Fans</p>
                                </div>
                            </div>
                                <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                                <div class="follow-count">
                                    <span>9999+</span>
                                    <p>Fans</p>
                                </div>
                            </div>
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="#"><i class="fab fa-youtube"></i></a>
                                </div>
                                <div class="follow-count">
                                    <span>9999+</span>
                                    <p>Fans</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Most Recent Area -->
                    <div class="most-recent-area">
                        <!-- Section Tittle -->
                        <div class="small-tittle mb-20">
                            <h4>Pembelajaran Menggunakan komputer</h4>
                        </div>
                        @if($latestArticles->count() > 5)
                        <!-- Details -->
                        <div class="most-recent mb-40">
                            <div class="most-recent-img">
                                @if($latestArticles->skip(5)->first()->foto)
                                    @if(str_starts_with($latestArticles->skip(5)->first()->foto, 'assets/'))
                                        <img src="{{ asset($latestArticles->skip(5)->first()->foto) }}" alt="{{ $latestArticles->skip(5)->first()->judul }}">
                                    @else
                                        <img src="{{ asset('storage/' . $latestArticles->skip(5)->first()->foto) }}" alt="{{ $latestArticles->skip(5)->first()->judul }}">
                                    @endif
                                @else
                                    <img src="{{ asset('assets/img/blog/single_blog_8.jpg') }}" alt="{{ $latestArticles->skip(5)->first()->judul }}">
                                @endif
                                <div class="most-recent-cap">
                                    <span class="bgbeg">{{ $latestArticles->skip(5)->first()->category->nama_kategori ?? 'News' }}</span>
                                    <h4><a href="{{ route('blog-details', $latestArticles->skip(5)->first()->id_artikel) }}">{{ Str::limit($latestArticles->skip(5)->first()->judul, 60) }}</a></h4>
                                    <p>{{ $latestArticles->skip(5)->first()->penulis }}  |  {{ $latestArticles->skip(5)->first()->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                        @foreach($latestArticles->skip(6)->take(2) as $article)
                        <!-- Single -->
                        <div class="most-recent-single">
                            <div class="most-recent-images">
                                @if($article->foto)
                                    @if(str_starts_with($article->foto, 'assets/'))
                                        <img src="{{ asset($article->foto) }}" alt="{{ $article->judul }}">
                                    @else
                                        <img src="{{ asset('storage/' . $article->foto) }}" alt="{{ $article->judul }}">
                                    @endif
                                @else
                                    <img src="{{ asset('assets/img/blog/slide_thumb_1.png') }}" alt="{{ $article->judul }}">
                                @endif
                            </div>
                            <div class="most-recent-capt">
                                <h4><a href="{{ route('blog-details', $article->id_artikel) }}">{{ Str::limit($article->judul, 50) }}</a></h4>
                                <p>{{ $article->penulis }}  |  {{ $article->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
