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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'dimensions' => 'nullable|string',
        ]);
    
        // Para depuración
    
        $artwork = new Artwork();
        $artwork->title = $validated['title'];
        $artwork->description = $validated['description'] ?? '';
        $artwork->price = $validated['price'];
        $artwork->dimensions = $validated['dimensions'] ?? '';
    
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/images');
            $artwork->image = $path;
        }
        if ($request->hasFile('image1')) {
            $path1 = $request->file('image1')->store('public/images');
            $artwork->image1 = $path1;
        }
        if ($request->hasFile('image2')) {
            $path2 = $request->file('image2')->store('public/images');
            $artwork->image2 = $path2;
        }
        if ($request->hasFile('image3')) {
            $path3 = $request->file('image3')->store('public/images');
            $artwork->image3 = $path3;
        }
        if ($request->hasFile('image4')) {
            $path4 = $request->file('image4')->store('public/images');
            $artwork->image4 = $path4;
        }
    
        $artwork->save();
    
        return redirect()->route('artworks.index')->with('success', 'Artwork created successfully.');
    }
    




    public function index()
    {
        $artworks = Artwork::all();
        return view('artworks.index', compact('artworks'));
    }
    
    public function showWelcome()
    {
        $artworks = Artwork::inRandomOrder()->take(5)->get(); // Obtén 5 obras de arte aleatorias
        return view('welcome', compact('artworks'));
    }
    
    

public function destroy(Artwork $artwork)
{
    $artwork->delete();

    return redirect()->route('artworks.index')->with('success', 'Artwork deleted successfully.');
}

public function show(Artwork $artwork)
{
    return view('artworks.show', compact('artwork'));
}

}
