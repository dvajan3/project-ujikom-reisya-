@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Profil Pengguna</h4>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    
                    <div class="row">
                        <div class="col-md-4 text-center">
                            @if($user->foto)
                                <img src="{{ asset('storage/' . $user->foto) }}" alt="Foto Profil" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                            @else
                                <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 150px; height: 150px;">
                                    <i class="fas fa-user fa-3x text-white"></i>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-8">
                            <table class="table table-borderless">
                                <tr>
                                    <td><strong>Nama:</strong></td>
                                    <td>{{ $user->nama }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Username:</strong></td>
                                    <td>{{ $user->username }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Email:</strong></td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Role:</strong></td>
                                    <td>
                                        <span class="badge badge-{{ $user->role == 'admin' ? 'danger' : ($user->role == 'guru' ? 'warning' : 'info') }}">
                                            {{ ucfirst($user->role) }}
                                        </span>
                                    </td>
                                </tr>
                            </table>
                            <div class="mt-3">
                                <a href="{{ route('profile.edit') }}" class="btn btn-primary me-2">Edit Profil</a>
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin logout?')">Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection