@extends('layouts.app')

@section('title', 'Latest News')

@section('content')
<!-- Latest News Area Start -->
<section class="latest-news-area pt-80 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle text-center mb-50">
                    <h3>Latest News</h3>
                    <p>Stay updated with the latest news</p>
                </div>
            </div>
        </div>
        <div class="row">
            @if($articles->count() > 0)
                @foreach($articles as $article)
                <div class="col-lg-4 col-md-6">
                    <div class="single-news mb-30">
                        <div class="news-img">
                            <img src="{{ asset('assets/img/gallery/single_blog_6.jpg') }}" alt="">
                            <div class="news-date">
                                <span>{{ $article->created_at->format('d M') }}</span>
                            </div>
                        </div>
                        <div class="news-caption">
                            <div class="news-cap-top">
                                <span class="color1">{{ $article->category->nama_kategori ?? 'News' }}</span>
                                <h4><a href="{{ route('blog-details', $article->id_artikel) }}">{{ $article->judul }}</a></h4>
                            </div>
                            <div class="news-cap-bottom d-flex justify-content-between">
                                <div class="news-cap-left">
                                    <span>{{ $article->penulis }}</span>
                                </div>
                                <div class="news-cap-right">
                                    <span>{{ $article->created_at->format('M d, Y') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
                <!-- Pagination -->
                <div class="col-12">
                    <div class="pagination-area text-center">
                        {{ $articles->links() }}
                    </div>
                </div>
            @else
                <div class="col-12 text-center">
                    <h4>No articles found</h4>
                    <p>Please check back later for new content.</p>
                </div>
            @endif
        </div>
    </div>
</section>
<!-- Latest News Area End -->
@endsection