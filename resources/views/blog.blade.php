@extends('layouts.app')

@section('title', 'Blog - News')

@section('content')
<!-- Blog Area Start -->
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    @if($articles->count() > 0)
                        @foreach($articles as $article)
                        <article class="blog_item">
                            <div class="blog_item_img">
                                @if($article->foto)
                                    @if(str_starts_with($article->foto, 'assets/'))
                                        <img class="card-img rounded-0" src="{{ asset($article->foto) }}" alt="{{ $article->judul }}">
                                    @else
                                        <img class="card-img rounded-0" src="{{ asset('storage/' . $article->foto) }}" alt="{{ $article->judul }}">
                                    @endif
                                @else
                                    <img class="card-img rounded-0" src="{{ asset('assets/img/blog/default.jpg') }}" alt="{{ $article->judul }}">
                                @endif
                                <a href="{{ route('blog-details', $article->id_artikel) }}" class="blog_item_date">
                                    <h3>{{ $article->created_at->format('d') }}</h3>
                                    <p>{{ $article->created_at->format('M') }}</p>
                                </a>
                            </div>
                            <div class="blog_details">
                                <a class="d-inline-block" href="{{ route('blog-details', $article->id_artikel) }}">
                                    <h2>{{ $article->judul }}</h2>
                                </a>
                                <p>{{ Str::limit(strip_tags($article->konten ?? $article->isi), 150) }}</p>
                                <ul class="blog-info-link">
                                    <li><a href="#"><i class="fa fa-user"></i> {{ $article->penulis }}</a></li>
                                    <li><a href="#"><i class="fa fa-clock-o"></i> {{ $article->created_at->diffForHumans() }}</a></li>
                                    <li><a href="#"><i class="fa fa-comments"></i> {{ $article->approvedComments->count() }} Comments</a></li>
                                </ul>
                            </div>
                        </article>
                        @endforeach
                        
                        <!-- Pagination -->
                        <nav class="blog-pagination justify-content-center d-flex">
                            {{ $articles->links() }}
                        </nav>
                    @else
                        <div class="text-center">
                            <h3>No articles found</h3>
                            <p>Please check back later for new content.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Area End -->
@endsection