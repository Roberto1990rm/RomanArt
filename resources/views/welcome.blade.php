@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
 

    @if($artworks->isNotEmpty())
    <div class="container">
        <h2 class="custom-heading">Bienvenido a la Página Principal</h2>
        <p>Este es el contenido de la página principal.</p>
        
        <div class="scrolling-wrapper">
            @foreach($artworks as $artwork)
                <div class="card">
                    <a href="{{ route('artworks.index') }}">
                        <img class="card-img-top" src="{{ Storage::url($artwork->image) }}" alt="{{ $artwork->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $artwork->title }}</h5>
                            <p class="card-text">{{ $artwork->description }}</p>
                            <p class="card-text"><strong>Dimensions:</strong> {{ $artwork->dimensions }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    
    @else
        <p>No artworks found.</p>
    @endif
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
    const wrapper = document.querySelector('.scrolling-wrapper');
    let isPaused = false; // Estado inicial

    wrapper.addEventListener('mouseenter', () => {
        isPaused = true;
        wrapper.style.animationPlayState = 'paused';
    });

    wrapper.addEventListener('mouseleave', () => {
        isPaused = false;
        wrapper.style.animationPlayState = 'running';
    });
});

</script>


@endsection
