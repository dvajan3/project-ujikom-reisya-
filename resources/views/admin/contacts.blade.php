@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Contact Data</h2>
    
    <h3>Users</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Joined</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Comments (Contact Messages)</h3>
    <table class="table">
        <thead>
            <tr>
                <th>User</th>
                <th>Email</th>
                <th>Comment</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($comments as $comment)
            <tr>
                <td>{{ $comment->user->name ?? 'Anonymous' }}</td>
                <td>{{ $comment->user->email ?? '-' }}</td>
                <td>{{ Str::limit($comment->isi, 50) }}</td>
                <td>{{ $comment->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection