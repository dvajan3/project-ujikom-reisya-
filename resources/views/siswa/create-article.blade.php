@extends('siswa.layouts.app')

@section('title', 'Tulis Artikel')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h2>Tulis Artikel Baru</h2>
            
            <div class="card mt-4">
                <div class="card-body">
                    <form action="{{ route('siswa.articles.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" name="judul" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="id_kategori" class="form-control" required>
                                <option value="">Pilih Kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id_kategori }}">{{ $category->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Konten</label>
                            <textarea name="isi" class="form-control" rows="10" required></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label>Gambar Utama</label>
                            <input type="file" name="foto" class="form-control" accept="image/*">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Kirim Artikel</button>
                        <a href="{{ route('siswa.dashboard') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection