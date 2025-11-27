@extends('admin.layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4">Dashboard Admin</h2>
            <div class="row">
                <div class="col-md-3 mb-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="fas fa-newspaper fa-3x text-primary mb-3"></i>
                            <h5>Kelola Artikel</h5>
                            <p class="text-muted">Buat, edit, dan kelola semua artikel</p>
                            <a href="{{ route('admin.articles') }}" class="btn btn-primary">Lihat Artikel</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="fas fa-tags fa-3x text-success mb-3"></i>
                            <h5>Kelola Kategori</h5>
                            <p class="text-muted">Atur artikel berdasarkan kategori</p>
                            <a href="{{ route('admin.categories') }}" class="btn btn-success">Lihat Kategori</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="fas fa-users fa-3x text-info mb-3"></i>
                            <h5>Kelola Pengguna</h5>
                            <p class="text-muted">Kelola akun pengguna dan peran</p>
                            <a href="{{ route('admin.users') }}" class="btn btn-info">Lihat Pengguna</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <i class="fas fa-eye fa-3x text-warning mb-3"></i>
                            <h5>Lihat Website</h5>
                            <p class="text-muted">Pratinjau website publik</p>
                            <a href="{{ route('home') }}" class="btn btn-warning" target="_blank">Lihat Situs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection