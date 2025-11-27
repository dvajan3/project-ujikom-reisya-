@extends('layouts.app')

@section('title', 'Search Results - Reisya Majalah')

@section('content')
<div class="search-results-area" style="padding: 80px 0; background: var(--light-color);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="search-header mb-5 animate-on-scroll">
                    <h1 class="search-title">Search Results</h1>
                    <p class="search-info">
                        @if($articles->count() > 0)
                            Found {{ $articles->total() }} result(s) for "<strong>{{ $query }}</strong>"
                        @else
                            No results found for "<strong>{{ $query }}</strong>"
                        @endif
                    </p>
                </div>
            </div>
        </div>

        @if($articles->count() > 0)
        <div class="row">
            @foreach($articles as $index => $article)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="single-article animate-on-scroll card-hover">
                    <div class="article-img image-hover">
                        @if($article->foto)
                            @if(str_starts_with($article->foto, 'assets/'))
                                <img src="{{ asset($article->foto) }}" alt="{{ $article->judul }}">
                            @else
                                <img src="{{ asset('storage/' . $article->foto) }}" alt="{{ $article->judul }}">
                            @endif
                        @else
                            <img src="{{ asset('assets/img/blog/default.jpg') }}" alt="{{ $article->judul }}">
                        @endif
                    </div>
                    <div class="article-content">
                        <div class="article-meta mb-3">
                            <span class="color{{ ($index % 4) + 1 }}">{{ $article->category->nama_kategori ?? 'News' }}</span>
                        </div>
                        <h4><a href="{{ route('blog-details', $article->id_artikel) }}">{{ $article->judul }}</a></h4>
                        <p class="article-excerpt">{{ Str::limit(strip_tags($article->konten), 120) }}</p>
                        <div class="article-footer d-flex justify-content-between align-items-center">
                            <small class="text-muted"><i class="fas fa-clock me-1"></i> {{ $article->created_at->diffForHumans() }}</small>
                            <small class="text-muted"><i class="fas fa-user me-1"></i> {{ $article->user->nama ?? 'Admin' }}</small>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="row">
            <div class="col-lg-12">
                <div class="pagination-wrapper text-center mt-5">
                    {{ $articles->appends(['q' => $query])->links() }}
                </div>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-lg-12">
                <div class="no-results text-center animate-on-scroll">
                    <div class="no-results-icon mb-4">
                        <i class="fas fa-search" style="font-size: 80px; color: var(--gray-400);"></i>
                    </div>
                    <h3 class="mb-3">No Articles Found</h3>
                    <p class="mb-4">We couldn't find any articles matching your search. Try different keywords or browse our categories.</p>
                    <div class="search-suggestions">
                        <a href="{{ route('home') }}" class="btn btn-primary me-3">
                            <i class="fas fa-home me-2"></i>Back to Home
                        </a>
                        <a href="{{ route('category') }}" class="btn btn-outline-primary">
                            <i class="fas fa-th-large me-2"></i>Browse Categories
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection