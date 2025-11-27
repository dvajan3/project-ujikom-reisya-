@extends('layouts.app')

@section('title', $article->judul ?? 'Detail Artikel')

@section('content')
<!-- Blog Details Area Start -->
<section class="blog_area single-post-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 posts-list">
                <div class="single-post">
                    @if($article->foto)
                    <div class="feature-img">
                        @if(str_starts_with($article->foto, 'assets/'))
                            <img class="img-fluid" src="{{ asset($article->foto) }}" alt="{{ $article->judul }}">
                        @else
                            <img class="img-fluid" src="{{ asset('storage/' . $article->foto) }}" alt="{{ $article->judul }}">
                        @endif
                    </div>
                    @endif
                    <div class="blog_details">
                        <h2>{{ $article->judul }}</h2>
                        <ul class="blog-info-link mt-3 mb-4">
                            <li><a href="#"><i class="fa fa-user"></i> {{ $article->penulis }}</a></li>
                            <li><a href="#"><i class="fa fa-clock-o"></i> {{ $article->created_at->diffForHumans() }}</a></li>
                            <li><a href="#"><i class="fa fa-tag"></i> {{ $article->category->nama_kategori ?? 'News' }}</a></li>
                        </ul>
                        <div class="article-content">
                            {!! nl2br(e($article->konten ?? $article->isi)) !!}
                        </div>
                    </div>
                </div>
                
                @if($relatedArticles->count() > 0)
                <div class="navigation-top">
                    <div class="d-sm-flex justify-content-between text-center">
                        <p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span> Artikel Terkait</p>
                    </div>
                </div>
                
                <div class="blog-author">
                    <div class="row">
                        @foreach($relatedArticles as $related)
                        <div class="col-md-4">
                            <div class="related-post">
                                @if($related->foto)
                                <div class="related-img">
                                    @if(str_starts_with($related->foto, 'assets/'))
                                        <img src="{{ asset($related->foto) }}" alt="{{ $related->judul }}">
                                    @else
                                        <img src="{{ asset('storage/' . $related->foto) }}" alt="{{ $related->judul }}">
                                    @endif
                                </div>
                                @endif
                                <div class="related-cap">
                                    <h6><a href="{{ route('blog-details', $related->id_artikel) }}">{{ Str::limit($related->judul, 50) }}</a></h6>
                                    <span>{{ $related->created_at->format('M d, Y') }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
                
                <!-- Comments Section -->
                <div class="comments-area mt-5">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <h4>Komentar ({{ $article->approvedComments->count() }})</h4>
                    
                    @auth
                    <div class="comment-form mt-4">
                        <h5>Tinggalkan Komentar</h5>
                        <form action="{{ route('comments.store', $article->id_artikel) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <textarea name="content" class="form-control" rows="4" placeholder="Tulis komentar Anda..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Kirim Komentar</button>
                        </form>
                    </div>
                    @else
                    <p><a href="{{ route('login') }}">Masuk</a> untuk memberikan komentar.</p>
                    @endauth
                    
                    <!-- Display Comments -->
                    <div class="comments-list mt-4">
                        @if($article->approvedComments->count() > 0)
                            @foreach($article->approvedComments as $comment)
                            <div class="single-comment mb-3 p-3 border">
                                <div class="comment-author">
                                    <strong>{{ $comment->user->nama }}</strong>
                                    <small class="text-muted">{{ $comment->created_at->format('M d, Y H:i') }}</small>
                                </div>
                                <div class="comment-content mt-2">
                                    {{ $comment->content }}
                                </div>
                            </div>
                            @endforeach
                        @else
                            <p class="text-muted">Belum ada komentar. Jadilah yang pertama berkomentar!</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Area End -->
@endsection