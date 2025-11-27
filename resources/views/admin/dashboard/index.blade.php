@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card bg-primary text-white h-100">
            <div class="card-body text-center">
                <i class="fas fa-newspaper fa-2x mb-3"></i>
                <h5 class="card-title">Total Articles</h5>
                <h2 class="mb-0">{{ $totalArticles ?? 0 }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-success text-white h-100">
            <div class="card-body text-center">
                <i class="fas fa-tags fa-2x mb-3"></i>
                <h5 class="card-title">Categories</h5>
                <h2 class="mb-0">{{ $totalCategories ?? 0 }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-warning text-white h-100">
            <div class="card-body text-center">
                <i class="fas fa-check-circle fa-2x mb-3"></i>
                <h5 class="card-title">Published</h5>
                <h2 class="mb-0">{{ $publishedArticles ?? 0 }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-info text-white h-100">
            <div class="card-body text-center">
                <i class="fas fa-edit fa-2x mb-3"></i>
                <h5 class="card-title">Draft</h5>
                <h2 class="mb-0">{{ $draftArticles ?? 0 }}</h2>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card h-100">
            <div class="card-body text-center">
                <i class="fas fa-newspaper fa-3x text-primary mb-3"></i>
                <h5>Manage Articles</h5>
                <p class="text-muted small">Create, edit, and manage all articles</p>
                <a href="{{ route('admin.articles') }}" class="btn btn-primary btn-sm w-100">ARTICLES</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card h-100">
            <div class="card-body text-center">
                <i class="fas fa-tags fa-3x text-success mb-3"></i>
                <h5>Manage Categories</h5>
                <p class="text-muted small">Organize articles by categories</p>
                <a href="{{ route('admin.categories') }}" class="btn btn-success btn-sm w-100">CATEGORIES</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card h-100">
            <div class="card-body text-center">
                <i class="fas fa-users fa-3x text-warning mb-3"></i>
                <h5>Manage Users</h5>
                <p class="text-muted small">Manage user accounts and roles</p>
                <a href="{{ route('admin.users') }}" class="btn btn-warning btn-sm w-100">USERS</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card h-100">
            <div class="card-body text-center">
                <i class="fas fa-globe fa-3x text-info mb-3"></i>
                <h5>View Website</h5>
                <p class="text-muted small">Preview the public website</p>
                <a href="{{ route('home') }}" class="btn btn-info btn-sm w-100" target="_blank">WEBSITE</a>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Recent Articles</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentArticles ?? [] as $article)
                            <tr>
                                <td>{{ $article->judul }}</td>
                                <td>{{ $article->category->nama_kategori ?? 'N/A' }}</td>
                                <td>{{ $article->penulis }}</td>
                                <td>{{ $article->created_at->format('M d, Y') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">No articles found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection