@extends('siswa.layouts.app')

@section('title', 'Edit Article')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h2>Edit Article</h2>
            
            <div class="card mt-4">
                <div class="card-body">
                    <form action="{{ route('siswa.articles.update', $article) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="judul" class="form-control" value="{{ $article->judul }}" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Category</label>
                            <select name="id_kategori" class="form-control" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id_kategori }}" {{ $article->id_kategori == $category->id_kategori ? 'selected' : '' }}>
                                        {{ $category->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Content</label>
                            <textarea name="isi" class="form-control" rows="10" required>{{ $article->isi }}</textarea>
                        </div>
                        
                        <div class="form-group">
                            <label>Featured Image</label>
                            @if($article->foto)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $article->foto) }}" alt="Current image" style="max-width: 200px;">
                                </div>
                            @endif
                            <input type="file" name="foto" class="form-control" accept="image/*">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Update Article</button>
                        <a href="{{ route('siswa.dashboard') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection