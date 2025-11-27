@extends('admin.layouts.app')

@section('title', 'Create Article')
@section('page-title', 'Create Article')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="judul" class="form-label">Title</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                       id="judul" name="judul" value="{{ old('judul') }}" required>
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="id_kategori" class="form-label">Category</label>
                <select class="form-select @error('id_kategori') is-invalid @enderror" 
                        id="id_kategori" name="id_kategori" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id_kategori }}" {{ old('id_kategori') == $category->id_kategori ? 'selected' : '' }}>
                            {{ $category->nama_kategori }}
                        </option>
                    @endforeach
                </select>
                @error('id_kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="konten" class="form-label">Content</label>
                <textarea class="form-control @error('konten') is-invalid @enderror" 
                          id="konten" name="konten" rows="10" required>{{ old('konten') }}</textarea>
                @error('konten')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Image</label>
                <input type="file" class="form-control @error('foto') is-invalid @enderror" 
                       id="foto" name="foto" accept="image/*">
                @error('foto')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Create Article</button>
                <a href="{{ route('admin.articles') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection