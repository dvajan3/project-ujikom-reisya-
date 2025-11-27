@extends('layouts.app')

@section('title', 'Category - Reisya Majalah')

@section('content')
<!-- Whats New Start -->
<section class="whats-news-area pt-50 pb-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row d-flex justify-content-between">
                    <div class="col-lg-3 col-md-3">
                        <div class="section-tittle mb-30">
                            <h3>Categories</h3>
                        </div>
                    </div>
                    
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- Nav Card -->
                        <div class="tab-content" id="nav-tabContent">
                            <!-- All Categories -->
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="row">
                                    @foreach($categories as $category)
                                        @foreach($category->articles->take(2) as $article)
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <div class="whats-news-single mb-40">
                                                <div class="whates-img">
                                                    @if($article->foto)
                                                        @if(str_starts_with($article->foto, 'assets/'))
                                                            <img src="{{ asset($article->foto) }}" alt="{{ $article->judul }}">
                                                        @else
                                                            <img src="{{ asset('storage/' . $article->foto) }}" alt="{{ $article->judul }}">
                                                        @endif
                                                    @else
                                                        <img src="{{ asset('assets/img/gallery/single_blog_6.jpg') }}" alt="{{ $article->judul }}">
                                                    @endif
                                                </div>
                                                <div class="whates-caption">
                                                    <span class="color1">{{ $category->nama_kategori }}</span>
                                                    <h4><a href="{{ route('blog-details', $article->id_artikel) }}">{{ $article->judul }}</a></h4>
                                                    <span>by {{ $article->penulis }} - {{ $article->created_at->format('M d, Y') }}</span>
                                                    <p>{{ Str::limit(strip_tags($article->isi), 100) }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                            <!-- Lifestyle -->
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="whats-news-single mb-40">
                                            <div class="whates-img">
                                                <img src="{{ asset('assets/img/gallery/single_blog_6.jpg') }}" alt="">
                                            </div>
                                            <div class="whates-caption">
                                                <h4><a href="#">Healthy Lifestyle Tips</a></h4>
                                                <span>by Health Expert - Dec 12, 2024</span>
                                                <p>Simple ways to improve your daily health and wellness routine.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Travel -->
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="whats-news-single mb-40">
                                            <div class="whates-img">
                                                <img src="{{ asset('assets/img/gallery/single_blog_6.jpg') }}" alt="">
                                            </div>
                                            <div class="whates-caption">
                                                <h4><a href="#">Travel Guide: Hidden Gems</a></h4>
                                                <span>by Travel Writer - Dec 13, 2024</span>
                                                <p>Explore amazing destinations that are off the beaten path.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fashion -->
                            <div class="tab-pane fade" id="nav-last" role="tabpanel" aria-labelledby="nav-last-tab">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="whats-news-single mb-40">
                                            <div class="whates-img">
                                                <img src="{{ asset('assets/img/elements/f6.jpg') }}" alt="">
                                            </div>
                                            <div class="whates-caption">
                                                <h4><a href="#">Fashion Week Highlights</a></h4>
                                                <span>by Fashion Editor - Dec 14, 2024</span>
                                                <p>The best looks and trends from this season's fashion week.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Sports -->
                            <div class="tab-pane fade" id="nav-nav-Sport" role="tabpanel" aria-labelledby="nav-Sports">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="whats-news-single mb-40">
                                            <div class="whates-img">
                                                <img src="{{ asset('assets/img/elements/f7.jpg') }}" alt="">
                                            </div>
                                            <div class="whates-caption">
                                                <h4><a href="#">Sports Championship Results</a></h4>
                                                <span>by Sports Reporter - Dec 11, 2024</span>
                                                <p>Latest results and highlights from major sporting events.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Technology -->
                            <div class="tab-pane fade" id="nav-techno" role="tabpanel" aria-labelledby="nav-techno">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="whats-news-single mb-40">
                                            <div class="whates-img">
                                                <img src="{{ asset('assets/img/blog/single_blog_2.png') }}" alt="">
                                            </div>
                                            <div class="whates-caption">
                                                <h4><a href="#">Latest Technology Trends in 2024</a></h4>
                                                <span>by Admin - Dec 15, 2024</span>
                                                <p>Discover the most innovative technology trends that are shaping our future.</p>
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
</section>
<!-- Whats New End -->
@endsection