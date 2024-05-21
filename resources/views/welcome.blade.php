@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
<div class="container">
    <h2 class="custom-heading">Bienvenido a la Página Principal</h2>
    <p>Este es el contenido de la página principal.</p>

    @if($latestArtwork)
        <a href="{{ route('artworks.index') }}" class="card-link">
            <div class="card custom-card">
                <img src="{{ Storage::url($latestArtwork->image) }}" class="card-img-top" alt="{{ $latestArtwork->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $latestArtwork->title }}</h5>
                    <p class="card-text">{{ $latestArtwork->description }}</p>
                    <p class="card-text"><strong>Price:</strong> ${{ $latestArtwork->price }}</p>
                    <p class="card-text"><strong>Dimensions:</strong> {{ $latestArtwork->dimensions }}</p>
                    <p class="card-text"><strong>Status:</strong> {{ ucfirst($latestArtwork->status) }}</p>
                </div>
            </div>
        </a>
    @else
        <p>No artworks found.</p>
    @endif
</div>
@endsection
