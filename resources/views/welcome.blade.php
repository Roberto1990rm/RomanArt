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
                        <img src="{{ Storage::url($artwork->image) }}" alt="{{ $artwork->title }}">
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

<style>

.scrolling-wrapper {
    white-space: nowrap;
    overflow: hidden;
    position: relative;
    width: 100%; /* Asegura que el contenedor tome todo el ancho disponible */
}



.card {
    display: inline-block;
    width: 300px;  /* Ancho fijo de cada tarjeta */
    height: 300px; /* Altura fija de cada tarjeta */
    margin-right: 10px;
    animation: scroll 40s linear infinite;
    vertical-align: top; /* Alinea todas las tarjetas correctamente */
    overflow: hidden; /* Oculta cualquier desbordamiento dentro de la tarjeta */
    background-color: #fff; /* Fondo blanco para mejor visibilidad */
}



.card-img-top {
    width: 100%; /* Asegura que la imagen cubra el ancho de la tarjeta */
    height: 150px; /* Altura fija para las imágenes */
    object-fit: cover; /* Cambio a cover para asegurar que la imagen cubra completamente el espacio */
    background-color: #f8f9fa; /* Color de fondo en caso de que la imagen no cubra todo el espacio */
}



.card-body {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    overflow: hidden; /* Ajuste en caso de que el contenido exceda el espacio disponible */
    background-color: rgba(255, 255, 255, 0.8); /* Fondo semi-transparente para mejorar la lectura */
    padding: 10px; /* Espaciado interno */
}

@keyframes scroll {
    0% {
        transform: translateX(100%);
    }
    100% {
        transform: translateX(-100%);
    }
}



</style>
@endsection
