@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<div class="custom-contact-container mt-5">
    <h2>Contacto</h2>
    <p>Si tienes alguna pregunta, no dudes en contactarnos.</p>

    <!-- Formulario de contacto -->
    <div class="custom-contact-card">
        <div class="custom-contact-card-body">
            <form method="POST" action="{{ route('contact.send') }}">
                @csrf
                <div class="custom-contact-form-group mb-3">
                    <label for="name" class="custom-contact-form-label">Nombre</label>
                    <input type="text" class="custom-contact-form-control" id="name" name="name" required>
                </div>
                <div class="custom-contact-form-group mb-3">
                    <label for="email" class="custom-contact-form-label">Email</label>
                    <input type="email" class="custom-contact-form-control" id="email" name="email" required>
                </div>
                <div class="custom-contact-form-group mb-3">
                    <label for="message" class="custom-contact-form-label">Mensaje</label>
                    <textarea class="custom-contact-form-control" id="message" name="message" rows="3" required></textarea>
                </div>
                <button type="submit" class="custom-contact-btn">Enviar Mensaje</button>
            </form>
        </div>
    </div>

    <!-- Información de contacto con iconos -->
    <div class="custom-contact-info mt-4">
        <h4>Más formas de contactarnos</h4>
        <p><i class="bi bi-telephone-fill"></i> <a href="tel:+1234567890">+123 456 7890</a></p>
        <p><i class="bi bi-envelope-fill"></i> <a href="mailto:example@example.com">example@example.com</a></p>
    </div>
</div>
@endsection

