@extends('admin.layouts.app')

@section('title', 'Manage Articles')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Manage Articles</h4>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($articles as $article)
                                <tr>
                                    <td>{{ $article->id_artikel }}</td>
                                    <td>
                                        @if($article->foto)
                                            @if(str_starts_with($article->foto, 'assets/'))
                                                <img src="{{ asset($article->foto) }}" alt="Article Image" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">
                                            @else
                                                <img src="{{ asset('storage/' . $article->foto) }}" alt="Article Image" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">
                                            @endif
                                        @else
                                            <span class="text-muted">No image</span>
                                        @endif
                                    </td>
                                    <td>
                                        <strong>{{ Str::limit($article->judul, 50) }}</strong>
                                    </td>
                                    <td>{{ $article->user->nama ?? 'Unknown' }}</td>
                                    <td>
                                        <span class="badge bg-info">{{ $article->category->nama_kategori ?? 'No Category' }}</span>
                                    </td>
                                    <td>
                                        @if($article->status == 'published')
                                            <span class="badge bg-success">Published</span>
                                        @elseif($article->status == 'draft')
                                            <span class="badge bg-warning">Draft</span>
                                        @else
                                            <span class="badge bg-secondary">Archived</span>
                                        @endif
                                    </td>
                                    <td>{{ $article->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('blog-details', $article->id_artikel) }}" class="btn btn-sm btn-outline-primary" target="_blank">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.articles.edit', $article->id_artikel) }}" class="btn btn-sm btn-outline-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.articles.destroy', $article->id_artikel) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this article?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">No articles found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection