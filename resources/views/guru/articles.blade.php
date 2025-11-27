@extends('guru.layouts.app')

@section('title', 'Review Articles')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h2>Review Articles</h2>
            
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card mt-4">
                <div class="card-body">
                    @if($articles->count() > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($articles as $article)
                                <tr>
                                    <td>{{ Str::limit($article->judul, 50) }}</td>
                                    <td>{{ $article->penulis }}</td>
                                    <td>{{ $article->category->nama_kategori ?? 'N/A' }}</td>
                                    <td>
                                        <span class="badge {{ $article->status == 'published' ? 'badge-success' : 'badge-warning' }}">
                                            {{ ucfirst($article->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $article->created_at->format('M d, Y') }}</td>
                                    <td>
                                        @if($article->status == 'draft')
                                            <form action="{{ route('guru.articles.review', $article) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="published">
                                                <button type="submit" class="btn btn-sm btn-success">Publish</button>
                                            </form>
                                        @else
                                            <form action="{{ route('guru.articles.review', $article) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="draft">
                                                <button type="submit" class="btn btn-sm btn-warning">Return to Draft</button>
                                            </form>
                                        @endif
                                        <a href="{{ route('blog-details', $article->id_artikel) }}" class="btn btn-sm btn-info">View</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No articles to review.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection