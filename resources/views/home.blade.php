@extends('layouts.app')

@section('title', 'Home - Reisya Majalah')

@section('content')
<!-- Hero Section -->
<section class="hero-section" style="background: var(--gradient-primary); padding: 60px 0; margin-bottom: 60px;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="hero-content text-white animate-on-scroll">
                    <h1 class="display-4 fw-bold mb-4" style="color: var(--white);">Welcome to Reisya Majalah</h1>
                    <p class="lead mb-4" style="color: var(--white);">Discover the latest news, trending stories, and insightful articles from our digital magazine platform. Stay informed with quality content curated just for you.</p>
                    <div class="hero-buttons">
                        @auth
                            @if(auth()->user()->isSiswa())
                                <a href="{{ route('siswa.dashboard') }}" class="btn btn-warning btn-lg me-3">
                                    <i class="fas fa-tachometer-alt me-2"></i>My Dashboard
                                </a>
                                <a href="{{ route('siswa.articles.create') }}" class="btn btn-outline-light btn-lg">
                                    <i class="fas fa-plus me-2"></i>Write Article
                                </a>
                            @elseif(auth()->user()->isGuru())
                                <a href="{{ route('guru.dashboard') }}" class="btn btn-warning btn-lg me-3">
                                    <i class="fas fa-tachometer-alt me-2"></i>Review Dashboard
                                </a>
                                <a href="{{ route('guru.articles') }}" class="btn btn-outline-light btn-lg">
                                    <i class="fas fa-check-circle me-2"></i>Review Articles
                                </a>
                            @else
                                <a href="{{ route('latest') }}" class="btn btn-warning btn-lg me-3">
                                    <i class="fas fa-newspaper me-2"></i>Latest Articles
                                </a>
                                <a href="{{ route('category') }}" class="btn btn-outline-light btn-lg">
                                    <i class="fas fa-th-large me-2"></i>Browse Categories
                                </a>
                            @endif
                        @else
                            <a href="{{ route('latest') }}" class="btn btn-warning btn-lg me-3">
                                <i class="fas fa-newspaper me-2"></i>Latest Articles
                            </a>
                            <a href="{{ route('category') }}" class="btn btn-outline-light btn-lg">
                                <i class="fas fa-th-large me-2"></i>Browse Categories
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="hero-stats animate-on-scroll">
                    @auth
                        @if(auth()->user()->isSiswa())
                            <div class="stat-card text-center p-4 mb-3" style="background: rgba(255,255,255,0.1); border-radius: var(--border-radius); backdrop-filter: blur(10px);">
                                <h3 class="text-white mb-2">{{ auth()->user()->articles()->count() }}</h3>
                                <p class="text-white mb-0">My Articles</p>
                            </div>
                        @elseif(auth()->user()->isGuru())
                            <div class="stat-card text-center p-4 mb-3" style="background: rgba(255,255,255,0.1); border-radius: var(--border-radius); backdrop-filter: blur(10px);">
                                <h3 class="text-white mb-2">{{ \App\Models\Article::where('status', 'draft')->count() }}</h3>
                                <p class="text-white mb-0">Pending Reviews</p>
                            </div>
                        @endif
                    @endauth
                    <div class="stat-card text-center p-4" style="background: rgba(255,255,255,0.1); border-radius: var(--border-radius); backdrop-filter: blur(10px);">
                        <h3 class="text-white mb-2">{{ $articles->count() }}+</h3>
                        <p class="text-white mb-0">Articles Published</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Trending Area Start -->
<div class="trending-area fix">
    <div class="container">
        <div class="trending-main">
            <!-- Trending Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="trending-tittle animate-on-scroll">
                        <strong><i class="fas fa-fire me-2"></i>Trending Now</strong>
                        <div class="trending-animated">
                            <ul id="js-news" class="js-hidden">
                                @foreach($articles->take(3) as $article)
                                <li class="news-item">{{ Str::limit($article->judul, 60) }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    @if($articles->count() > 0)
                    <!-- Featured Article -->
                    <div class="trending-top mb-30 animate-on-scroll">
                        <div class="trend-top-img card-hover">
                            @if($articles->first()->foto)
                                @if(str_starts_with($articles->first()->foto, 'assets/'))
                                    <img src="{{ asset($articles->first()->foto) }}" alt="{{ $articles->first()->judul }}">
                                @else
                                    <img src="{{ asset('storage/' . $articles->first()->foto) }}" alt="{{ $articles->first()->judul }}">
                                @endif
                            @else
                                <img src="{{ asset('assets/img/trending/trending_top.jpg') }}" alt="{{ $articles->first()->judul }}">
                            @endif
                            <div class="trend-top-cap">
                                <div class="article-meta mb-3">
                                    <span class="color1">{{ $articles->first()->category->nama_kategori ?? 'Featured' }}</span>
                                    <span class="badge bg-warning ms-2"><i class="fas fa-star me-1"></i>Featured</span>
                                </div>
                                <h2><a href="{{ route('blog-details', $articles->first()->id_artikel) }}">{{ $articles->first()->judul }}</a></h2>
                                <p class="article-excerpt mb-3">{{ Str::limit(strip_tags($articles->first()->konten), 120) }}</p>
                                <div class="article-footer d-flex justify-content-between align-items-center">
                                    <small><i class="fas fa-clock me-1"></i> {{ $articles->first()->created_at->diffForHumans() }}</small>
                                    <small><i class="fas fa-user me-1"></i> {{ $articles->first()->user->nama ?? 'Admin' }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Recent Articles Grid -->
                    <div class="trending-bottom">
                        <div class="section-header mb-4">
                            <h3 class="section-title"><i class="fas fa-newspaper me-2"></i>Recent Articles</h3>
                        </div>
                        <div class="row">
                            @foreach($articles->skip(1)->take(3) as $index => $article)
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="single-bottom animate-on-scroll card-hover">
                                    <div class="trend-bottom-img image-hover">
                                        @if($article->foto)
                                            @if(str_starts_with($article->foto, 'assets/'))
                                                <img src="{{ asset($article->foto) }}" alt="{{ $article->judul }}">
                                            @else
                                                <img src="{{ asset('storage/' . $article->foto) }}" alt="{{ $article->judul }}">
                                            @endif
                                        @else
                                            <img src="{{ asset('assets/img/trending/trending_bottom' . ($index + 1) . '.jpg') }}" alt="{{ $article->judul }}">
                                        @endif
                                    </div>
                                    <div class="trend-bottom-cap">
                                        <span class="color{{ ($index % 3) + 1 }}">{{ $article->category->nama_kategori ?? 'News' }}</span>
                                        <h4><a href="{{ route('blog-details', $article->id_artikel) }}">{{ Str::limit($article->judul, 50) }}</a></h4>
                                        <p class="article-excerpt">{{ Str::limit(strip_tags($article->konten), 80) }}</p>
                                        <div class="article-meta d-flex justify-content-between align-items-center">
                                            <small class="text-muted"><i class="fas fa-clock me-1"></i> {{ $article->created_at->diffForHumans() }}</small>
                                            <small class="text-muted"><i class="fas fa-eye me-1"></i> {{ rand(50, 500) }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="sidebar-wrapper">
                        <!-- Latest News Widget -->
                        <div class="trand-right-wrapper animate-on-scroll">
                            <div class="trand-right-header">
                                <h3><i class="fas fa-bolt me-2"></i>Latest Updates</h3>
                            </div>
                            @foreach($articles->skip(4)->take(5) as $index => $article)
                            <div class="trand-right-single d-flex">
                                <div class="trand-right-img image-hover">
                                    @if($article->foto)
                                        @if(str_starts_with($article->foto, 'assets/'))
                                            <img src="{{ asset($article->foto) }}" alt="{{ $article->judul }}">
                                        @else
                                            <img src="{{ asset('storage/' . $article->foto) }}" alt="{{ $article->judul }}">
                                        @endif
                                    @else
                                        <img src="{{ asset('assets/img/trending/right' . ($index + 1) . '.jpg') }}" alt="{{ $article->judul }}" onerror="this.src='{{ asset('assets/img/blog/default.jpg') }}';">
                                    @endif
                                </div>
                                <div class="trand-right-cap">
                                    <span class="color{{ ($index % 4) + 1 }}">{{ $article->category->nama_kategori ?? 'News' }}</span>
                                    <h4><a href="{{ route('blog-details', $article->id_artikel) }}">{{ Str::limit($article->judul, 40) }}</a></h4>
                                    <div class="article-meta">
                                        <small class="text-muted d-block"><i class="fas fa-clock me-1"></i> {{ $article->created_at->diffForHumans() }}</small>
                                        <small class="text-muted"><i class="fas fa-user me-1"></i> {{ $article->user->nama ?? 'Admin' }}</small>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                            <div class="text-center mt-4">
                                <a href="{{ route('latest') }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-arrow-right me-2"></i>View All Articles
                                </a>
                            </div>
                        </div>
                        
                        <!-- Newsletter Widget -->
                        <div class="newsletter-widget mt-4 animate-on-scroll" style="background: var(--gradient-secondary); padding: 30px; border-radius: var(--border-radius); color: var(--white);">
                            <h4 class="text-white mb-3"><i class="fas fa-envelope me-2"></i>Stay Updated</h4>
                            <p class="mb-3" style="opacity: 0.9;">Subscribe to our newsletter and never miss the latest articles and updates.</p>
                            <form class="newsletter-form">
                                <div class="input-group">
                                    <input type="email" class="form-control" placeholder="Your email address" required>
                                    <button class="btn btn-warning" type="submit">
                                        <i class="fas fa-paper-plane"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Trending Area End -->
@endsection