@extends('layouts.app')

@section('title', 'Manage Categories')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h2>Manage Categories</h2>
            
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card mt-4">
                <div class="card-header">
                    <h5>Add New Category</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.categories.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" name="nama_kategori" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Category</button>
                    </form>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <h5>Existing Categories</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Articles Count</th>
                                <th>Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id_kategori }}</td>
                                <td>{{ $category->nama_kategori }}</td>
                                <td>{{ $category->articles->count() }}</td>
                                <td>{{ $category->created_at->format('M d, Y') }}</td>
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