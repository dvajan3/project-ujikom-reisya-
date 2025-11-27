@extends('guru.layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h2>My Profile</h2>
            
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h5>Profile Information</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('guru.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="nama">Name</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $user->nama }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="foto">Profile Photo</label>
                            <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                            @if($user->foto)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $user->foto) }}" alt="Profile" class="img-thumbnail" width="100">
                                </div>
                            @endif
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </form>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline ms-2">
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to logout?')">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection