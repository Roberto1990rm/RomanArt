<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artwork;

class ArtworkController extends Controller
{
    // Mostrar el formulario de creación
    public function create()
    {
        return view('artworks.create');
    }

    // Almacenar un nuevo Artwork
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|file|image|max:2048',
            'image1' => 'nullable|file|image|max:2048',
            'image2' => 'nullable|file|image|max:2048',
            'image3' => 'nullable|file|image|max:2048',
            'image4' => 'nullable|file|image|max:2048',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'dimensions' => 'nullable|string',
        ]);

        // Subir las imágenes
        $path = $request->file('image')->store('public/images');
        $path1 = $request->file('image1') ? $request->file('image1')->store('public/images') : null;
        $path2 = $request->file('image2') ? $request->file('image2')->store('public/images') : null;
        $path3 = $request->file('image3') ? $request->file('image3')->store('public/images') : null;
        $path4 = $request->file('image4') ? $request->file('image4')->store('public/images') : null;

        // Crear el Artwork
        Artwork::create([
            'title' => $validated['title'],
            'image' => $path,
            'image1' => $path1,
            'image2' => $path2,
            'image3' => $path3,
            'image4' => $path4,
            'description' => $validated['description'],
            'price' => $validated['price'],
            'dimensions' => $validated['dimensions'],
        ]);

        return redirect()->route('artworks.index')->with('success', 'Artwork created successfully.');
    }


    public function index()
    {
        $artworks = Artwork::all();
        return view('artworks.index', compact('artworks'));
    }
}
