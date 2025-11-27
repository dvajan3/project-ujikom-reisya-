@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Profil</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-4 text-center">
                                @if($user->foto)
                                    <img src="{{ asset('storage/' . $user->foto) }}" alt="Foto Profil" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;" id="preview">
                                @else
                                    <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 150px; height: 150px;" id="preview">
                                        <i class="fas fa-user fa-3x text-white"></i>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <input type="file" class="form-control-file" name="foto" accept="image/*" onchange="previewImage(this)">
                                    @error('foto')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group mb-3">
                                    <label>Nama</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $user->nama) }}" required>
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label>Username</label>
                                    <input type="text" class="form-control" value="{{ $user->username }}" readonly>
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label>Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label>Role</label>
                                    <input type="text" class="form-control" value="{{ ucfirst($user->role) }}" readonly>
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('profile.show') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview').innerHTML = '<img src="' + e.target.result + '" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">';
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection