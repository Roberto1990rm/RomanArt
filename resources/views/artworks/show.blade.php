@extends('layouts.app')

@section('title', $artwork->title)

@section('content')
<div class="container">
    <div class="custom-card">
        <div class="custom-card-bg"></div>
        <img src="{{ Storage::url($artwork->image) }}" class="card-img-top" alt="{{ $artwork->title }}">
        <div class="card-body">
            <h5 class="card-title">{{ $artwork->title }}</h5>
            <p class="card-text">{{ $artwork->description }}</p>
            <p class="card-text"><strong>Price:</strong> ${{ $artwork->price }}</p>
            <p class="card-text"><strong>Dimensions:</strong> {{ $artwork->dimensions }}</p>
            <p class="card-text"><strong>Status:</strong> {{ ucfirst($artwork->status) }}</p>
            <a href="{{ route('artworks.index') }}" class="btn btn-primary">Back to Gallery</a>
        </div>
    </div>
</div>
@endsection
