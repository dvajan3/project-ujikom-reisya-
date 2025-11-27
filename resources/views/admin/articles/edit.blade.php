@extends('admin.layouts.app')

@section('title', 'Edit Article')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Edit Article</h4>
                    <a href="{{ route('admin.articles') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to Articles
                    </a>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.articles.update', $article->id_artikel) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="judul" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $article->judul) }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="isi" class="form-label">Content</label>
                                    <textarea class="form-control" id="isi" name="isi" rows="15" required>{{ old('isi', $article->isi) }}</textarea>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="status" name="status" required>
                                        <option value="draft" {{ old('status', $article->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                                        <option value="published" {{ old('status', $article->status) == 'published' ? 'selected' : '' }}>Published</option>
                                        <option value="archived" {{ old('status', $article->status) == 'archived' ? 'selected' : '' }}>Archived</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="id_kategori" class="form-label">Category</label>
                                    <select class="form-select" id="id_kategori" name="id_kategori" required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id_kategori }}" {{ old('id_kategori', $article->id_kategori) == $category->id_kategori ? 'selected' : '' }}>
                                                {{ $category->nama_kategori }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="foto" class="form-label">Featured Image</label>
                                    @if($article->foto)
                                        <div class="mb-2">
                                            <p class="text-muted small">Current image:</p>
                                            @if(str_starts_with($article->foto, 'assets/'))
                                                <img src="{{ asset($article->foto) }}" alt="Current Image" class="img-thumbnail" style="max-width: 200px;">
                                            @else
                                                <img src="{{ asset('storage/' . $article->foto) }}" alt="Current Image" class="img-thumbnail" style="max-width: 200px;">
                                            @endif
                                        </div>
                                    @endif
                                    <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                                    <small class="form-text text-muted">Leave empty to keep current image. Accepted formats: JPEG, PNG, JPG, GIF (max 2MB)</small>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Article Info</label>
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <p class="mb-1"><strong>Author:</strong> {{ $article->user->nama ?? 'Unknown' }}</p>
                                            <p class="mb-1"><strong>Created:</strong> {{ $article->created_at->format('M d, Y H:i') }}</p>
                                            <p class="mb-0"><strong>Updated:</strong> {{ $article->updated_at->format('M d, Y H:i') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('blog-details', $article->id_artikel) }}" class="btn btn-outline-info" target="_blank">
                                <i class="fas fa-eye"></i> Preview Article
                            </a>
                            <div>
                                <a href="{{ route('admin.articles') }}" class="btn btn-secondary me-2">Cancel</a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Update Article
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Auto-resize textarea
    document.getElementById('isi').addEventListener('input', function() {
        this.style.height = 'auto';
        this.style.height = this.scrollHeight + 'px';
    });
    
    // Image preview
    document.getElementById('foto').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                let preview = document.getElementById('image-preview');
                if (!preview) {
                    preview = document.createElement('img');
                    preview.id = 'image-preview';
                    preview.className = 'img-thumbnail mt-2';
                    preview.style.maxWidth = '200px';
                    document.getElementById('foto').parentNode.appendChild(preview);
                }
                preview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
    
    // Form validation
    document.querySelector('form').addEventListener('submit', function(e) {
        const title = document.getElementById('judul').value.trim();
        const content = document.getElementById('isi').value.trim();
        
        if (title.length < 5) {
            alert('Title must be at least 5 characters long');
            e.preventDefault();
            return;
        }
        
        if (content.length < 50) {
            alert('Content must be at least 50 characters long');
            e.preventDefault();
            return;
        }
    });
</script>
@endpush