@extends('layouts.app')

@section('title', 'Daftar')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Daftar</h4>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" value="{{ old('username') }}" required>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label>Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100">Daftar</button>
                    </form>
                    
                    <div class="text-center mt-3">
                        <p>Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection