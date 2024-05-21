@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
<div class="container">

    <h2 class="custom-heading">Bienvenido</h2>

    <a href="{{ route('artworks.create') }}" class="btn btn-primary mb-3">Create New Artwork</a>
</div>

</div>
@endsection
