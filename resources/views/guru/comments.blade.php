@extends('guru.layouts.app')

@section('title', 'Manage Comments')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h2>Manage Comments</h2>
            
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h5>Comments Awaiting Review</h5>
                </div>
                <div class="card-body">
                    @if($comments->count() > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Article</th>
                                    <th>Comment</th>
                                    <th>Author</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($comments as $comment)
                                <tr>
                                    <td>{{ Str::limit($comment->article->judul, 30) }}</td>
                                    <td>{{ Str::limit($comment->komentar, 50) }}</td>
                                    <td>{{ $comment->user->nama }}</td>
                                    <td>{{ $comment->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <span class="badge 
                                            @if($comment->status == 'approved') badge-success
                                            @elseif($comment->status == 'pending') badge-warning
                                            @else badge-danger @endif">
                                            {{ ucfirst($comment->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($comment->status == 'pending')
                                            <form action="{{ route('guru.comments.review', $comment) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="approved">
                                                <button type="submit" class="btn btn-sm btn-success">Approve</button>
                                            </form>
                                            <form action="{{ route('guru.comments.review', $comment) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="rejected">
                                                <button type="submit" class="btn btn-sm btn-warning">Reject</button>
                                            </form>
                                        @endif
                                        <form action="{{ route('guru.comments.delete', $comment) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No comments to review.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection