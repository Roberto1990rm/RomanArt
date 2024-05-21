@extends('layouts.app')

@section('title', 'Artworks')

@section('content')
<div class="container">
    <h2 class="custom-heading">Artworks</h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('artworks.create') }}" class="btn btn-primary mb-3">Create New Artwork</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Price</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($artworks as $artwork)
                <tr>
                    <td>{{ $artwork->title }}</td>
                    <td>{{ $artwork->price }}</td>
                    <td>{{ $artwork->status }}</td>
                    <td>
                        <a href="{{ route('artworks.show', $artwork->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('artworks.edit', $artwork->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('artworks.destroy', $artwork->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
