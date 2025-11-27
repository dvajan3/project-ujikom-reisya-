@extends('admin.layouts.app')

@section('title', 'Categories')
@section('page-title', 'Categories')

@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Categories</h4>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Add New Category</a>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                <tr>
                    <td>{{ $category->nama_kategori }}</td>
                    <td>{{ $category->created_at->format('M d, Y') }}</td>
                    <td>
                        <a href="{{ route('admin.categories.edit', $category->id_kategori) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('admin.categories.destroy', $category->id_kategori) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center">No categories found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{ $categories->links() }}
    </div>
</div>
@endsection