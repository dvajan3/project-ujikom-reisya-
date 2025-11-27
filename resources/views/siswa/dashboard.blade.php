@extends('siswa.layouts.app')

@section('title', 'Dashboard Siswa')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h2>Dashboard Siswa</h2>
            
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <!-- Statistics Cards -->
            <div class="row mt-4">
                <div class="col-md-3">
                    <div class="card text-white bg-primary">
                        <div class="card-body">
                            <h5 class="card-title">Total Artikel</h5>
                            <h2>{{ $totalArticles }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-success">
                        <div class="card-body">
                            <h5 class="card-title">Terbit</h5>
                            <h2>{{ $publishedArticles }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-warning">
                        <div class="card-body">
                            <h5 class="card-title">Draft</h5>
                            <h2>{{ $draftArticles }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-secondary">
                        <div class="card-body">
                            <h5 class="card-title">Arsip</h5>
                            <h2>{{ $archivedArticles }}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <a href="{{ route('siswa.articles.create') }}" class="btn btn-primary mb-3">Tulis Artikel Baru</a>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5>Artikel Saya</h5>
                </div>
                <div class="card-body">
                    @if($articles->count() > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Status</th>
                                    <th>Dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($articles as $article)
                                <tr>
                                    <td>{{ $article->judul }}</td>
                                    <td>{{ $article->category->nama_kategori ?? 'N/A' }}</td>
                                    <td>
                                        <span class="badge 
                                            @if($article->status == 'published') badge-success
                                            @elseif($article->status == 'draft') badge-warning
                                            @elseif($article->status == 'archived') badge-secondary
                                            @else badge-info @endif">
                                            @if($article->status == 'published')
                                                <i class="fas fa-check-circle"></i> Terbit
                                            @elseif($article->status == 'draft')
                                                <i class="fas fa-edit"></i> Draft
                                            @elseif($article->status == 'archived')
                                                <i class="fas fa-archive"></i> Arsip
                                            @else
                                                <i class="fas fa-clock"></i> {{ ucfirst($article->status) }}
                                            @endif
                                        </span>
                                    </td>
                                    <td>{{ $article->created_at->format('M d, Y') }}</td>
                                    <td>
                                        @if($article->status != 'published')
                                            <a href="{{ route('siswa.articles.edit', $article) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('siswa.articles.destroy', $article) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')"
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        @endif
                                        <a href="{{ route('blog-details', $article->id_artikel) }}" class="btn btn-sm btn-info">Lihat</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Anda belum menulis artikel apapun. <a href="{{ route('siswa.articles.create') }}">Tulis artikel pertama Anda</a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection