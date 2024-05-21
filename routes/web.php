<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtworkController;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/', [ArtworkController::class, 'showWelcome'])->name('welcome');


// Ruta para mostrar el formulario de creación de Artwork
Route::get('/artworks/create', [ArtworkController::class, 'create'])->name('artworks.create');

// Ruta para almacenar un nuevo Artwork
Route::post('/artworks', [ArtworkController::class, 'store'])->name('artworks.store');

Route::get('/artworks/{artwork}', [ArtworkController::class, 'show'])->name('artworks.show');

// Ruta para listar todos los Artworks
Route::get('/artworks', [ArtworkController::class, 'index'])->name('artworks.index');

Route::delete('/artworks/{artwork}', [ArtworkController::class, 'destroy'])->name('artworks.destroy');
// Otras rutas para Artwork si es necesario
Route::resource('artworks', ArtworkController::class)->except(['create', 'store', 'index']);


