@extends('layouts.app')

@section('title', 'Manage Users')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h2>Manage Users</h2>
            
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card mt-4">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Current Role</th>
                                <th>Change Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->nama }}</td>
                                <td>{{ $user->email }}</td>
                                <td><span class="badge badge-info">{{ ucfirst($user->role) }}</span></td>
                                <td>
                                    <form action="{{ route('admin.users.role', $user) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <select name="role" class="form-control form-control-sm d-inline" style="width: auto;">
                                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                            <option value="siswa" {{ $user->role == 'siswa' ? 'selected' : '' }}>Siswa</option>
                                            <option value="guru" {{ $user->role == 'guru' ? 'selected' : '' }}>Guru</option>
                                            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                        </select>
                                </td>
                                <td>
                                        <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection