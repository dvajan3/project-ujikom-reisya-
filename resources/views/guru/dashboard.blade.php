@extends('guru.layouts.app')

@section('title', 'Dashboard Guru')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h2>Dashboard Guru</h2>
            
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Artikel Menunggu ({{ $pendingArticles->count() }})</h5>
                        </div>
                        <div class="card-body">
                            @if($pendingArticles->count() > 0)
                                @foreach($pendingArticles->take(5) as $article)
                                <div class="mb-3 p-2 border-bottom">
                                    <h6>{{ $article->judul }}</h6>
                                    <small>by {{ $article->penulis }} - {{ $article->created_at->format('M d, Y') }}</small>
                                    <div class="mt-2">
                                        <form action="{{ route('guru.articles.review', $article) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="published">
                                            <button type="submit" class="btn btn-sm btn-success">Terbitkan</button>
                                        </form>
                                        <form action="{{ route('guru.articles.review', $article) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="draft">
                                            <button type="submit" class="btn btn-sm btn-warning">Kembali ke Draft</button>
                                        </form>
                                    </div>
                                </div>
                                @endforeach
                                <a href="{{ route('guru.articles') }}" class="btn btn-primary btn-sm">Lihat Semua Artikel</a>
                            @else
                                <p>Tidak ada artikel yang menunggu</p>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5>Komentar Menunggu ({{ $pendingComments->count() }})</h5>
                        </div>
                        <div class="card-body">
                            @if($pendingComments->count() > 0)
                                @foreach($pendingComments->take(5) as $comment)
                                <div class="mb-3 p-2 border-bottom">
                                    <p>{{ Str::limit($comment->content, 100) }}</p>
                                    <small>by {{ $comment->user->nama }} - {{ $comment->created_at->format('M d, Y') }}</small>
                                    <div class="mt-2">
                                        <form action="{{ route('guru.comments.review', $comment) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="approved">
                                            <button type="submit" class="btn btn-sm btn-success">Setujui</button>
                                        </form>
                                        <form action="{{ route('guru.comments.review', $comment) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="rejected">
                                            <button type="submit" class="btn btn-sm btn-danger">Tolak</button>
                                        </form>
                                    </div>
                                </div>
                                @endforeach
                                <a href="{{ route('guru.comments') }}" class="btn btn-primary btn-sm">Lihat Semua Komentar</a>
                            @else
                                <p>Tidak ada komentar yang menunggu</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection