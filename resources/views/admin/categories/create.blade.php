@extends('admin.layouts.app')

@section('title', 'Create Category')
@section('page-title', 'Create Category')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_kategori" class="form-label">Category Name</label>
                <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" 
                       id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori') }}" required>
                @error('nama_kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Create Category</button>
                <a href="{{ route('admin.categories') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection