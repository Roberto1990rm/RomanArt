<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtworkController;



// Ruta para la página de bienvenida
Route::get('/', [ArtworkController::class, 'showWelcome'])->name('welcome');

// Ruta para mostrar el formulario de creación de Artwork
Route::get('/artworks/create', [ArtworkController::class, 'create'])->name('artworks.create');

// Ruta para almacenar un nuevo Artwork
Route::post('/artworks', [ArtworkController::class, 'store'])->name('artworks.store');

// Ruta para listar todos los Artworks
Route::get('/artworks', [ArtworkController::class, 'index'])->name('artworks.index');

// Ruta para mostrar un Artwork individual
Route::get('/artworks/{artwork}', [ArtworkController::class, 'show'])->name('artworks.show');

// Ruta para eliminar un Artwork
Route::delete('/artworks/{artwork}', [ArtworkController::class, 'destroy'])->name('artworks.destroy');

// Otras rutas para Artwork
Route::resource('artworks', ArtworkController::class)->except(['create', 'store', 'index', 'show', 'destroy']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
