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

    <div class="row">
        @foreach($artworks as $artwork)
            <div class="col-6 mb-4"> <!-- Cambiado a col-6 -->
                <div class="custom-card">
                    <div class="custom-card-bg"></div>
                    <img src="{{ Storage::url($artwork->image) }}" class="card-img-top" alt="{{ $artwork->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $artwork->title }}</h5>
                        <p class="card-text">
                            {{ Str::limit($artwork->description, 50) }}
                            <a href="{{ route('artworks.show', $artwork->id) }}" class="btn btn-link p-0 align-baseline">
                                <i class="fas fa-arrow-right"></i> ...Ver más
                            </a>
                        </p>
                        <p class="card-text"><strong>Price:</strong> ${{ $artwork->price }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
