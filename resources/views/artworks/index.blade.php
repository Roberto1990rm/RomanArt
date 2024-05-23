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

    @auth
    <a href="{{ route('artworks.create') }}" class="btn btn-primary mb-3">Create New Artwork</a>
    @endauth

    <div class="row">
        @foreach($artworks as $artwork)
        <div class="col-6 mb-4">
            <div class="custom-card">
                <div class="custom-card-bg"></div>
                <img src="{{ Storage::url($artwork->image) }}" style="height: 300px;" class="card-img-top" alt="{{ $artwork->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $artwork->title }}</h5>
                    <p class="card-text">
                        {{ Str::limit($artwork->description, 50) }}
                        <a href="{{ route('artworks.show', $artwork->id) }}" class="btn btn-link p-0 align-baseline"><i class="fas fa-arrow-right"></i> Ver más</a>
                    </p>
                    <p class="card-text"><strong>Price:</strong> ${{ $artwork->price }}</p>
                </div>
                @auth
                <form action="{{ route('artworks.destroy', $artwork->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                @endauth
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        <ul class="pagination">
            @if ($artworks->onFirstPage())
                <li class="disabled"><span>&laquo; Anterior</span></li>
            @else
                <li><a href="{{ $artworks->previousPageUrl() }}" rel="prev">&laquo; Anterior</a></li>
            @endif

            @foreach ($artworks->getUrlRange(1, $artworks->lastPage()) as $page => $url)
                @if ($page == $artworks->currentPage())
                    <li class="active"><span>{{ $page }}</span></li>
                @else
                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach

            @if ($artworks->hasMorePages())
                <li><a href="{{ $artworks->nextPageUrl() }}" rel="next">Siguiente &raquo;</a></li>
            @else
                <li class="disabled"><span>Siguiente &raquo;</span></li>
            @endif
        </ul>
    </div>
</div>
@endsection
