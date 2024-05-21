@extends('layouts.app')

@section('title', 'Create Artwork')

@section('content')
<div class="container">
    <h2 class="custom-heading">Create Artwork</h2>
    <form action="{{ route('artworks.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="image1">Additional Image 1</label>
            <input type="file" name="image1" id="image1" class="form-control">
        </div>
        <div class="form-group">
            <label for="image2">Additional Image 2</label>
            <input type="file" name="image2" id="image2" class="form-control">
        </div>
        <div class="form-group">
            <label for="image3">Additional Image 3</label>
            <input type="file" name="image3" id="image3" class="form-control">
        </div>
        <div class="form-group">
            <label for="image4">Additional Image 4</label>
            <input type="file" name="image4" id="image4" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="dimensions">Dimensions</label>
            <input type="text" name="dimensions" id="dimensions" class="form-control">
        </div>
        
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
