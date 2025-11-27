@extends('layouts.app')

@section('title', 'Latest News - Reisya Majalah')

@section('content')
<!-- Latest News Start -->
<div class="latest-news-area pt-50 pb-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Section Tittle -->
                <div class="section-tittle mb-30">
                    <h3>Latest News</h3>
                </div>
                <!-- News List -->
                <div class="row">
                    @if($articles->count() > 0)
                        @foreach($articles as $article)
                        <div class="col-lg-6 col-md-6">
                            <div class="single-what-news mb-100" style="border: 1px solid #eee; padding: 20px; border-radius: 8px;">
                                <div class="what-img" style="margin-bottom: 20px; display: block;">
                                    @if($article->foto)
                                        @if(str_starts_with($article->foto, 'assets/'))
                                            <img src="{{ asset($article->foto) }}" alt="{{ $article->judul }}" style="width: 100%; height: auto; display: block; margin-bottom: 15px; border-radius: 5px;">
                                        @else
                                            <img src="{{ asset('storage/' . $article->foto) }}" alt="{{ $article->judul }}" style="width: 100%; height: auto; display: block; margin-bottom: 15px; border-radius: 5px;">
                                        @endif
                                    @else
                                        <img src="{{ asset('assets/img/blog/single_blog_6.jpg') }}" alt="{{ $article->judul }}" style="width: 100%; height: auto; display: block; margin-bottom: 15px; border-radius: 5px;">
                                    @endif
                                </div>
                                <div class="what-cap" style="margin-top: 15px;">
                                    <span class="color1">{{ $article->category->nama_kategori ?? 'News' }}</span>
                                    <h4><a href="{{ route('blog-details', $article->id_artikel) }}">{{ $article->judul }}</a></h4>
                                    <p>{{ Str::limit(strip_tags($article->isi), 150) }}</p>
                                    <span>by {{ $article->penulis }} - {{ $article->created_at->format('M d, Y') }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="col-12 text-center">
                            <h4>No articles found</h4>
                            <p>Please check back later for new content.</p>
                        </div>
                    @endif

                </div>
                <!-- Pagination -->
                @if($articles->hasPages())
                <div class="row">
                    <div class="col-lg-12">
                        <div class="pagination-wrap">
                            {{ $articles->links() }}
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- Latest News End -->
@endsection