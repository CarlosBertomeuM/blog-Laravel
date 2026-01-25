<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('titol', 'asc')->paginate(5);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
   public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(PostRequest $request)
    {
        $post = new Post();
        $post->titol = $request->titol;
        $post->contingut = $request->contingut;
        $post->usuari_id = auth()->id(); // Ara usa l'usuari autenticat
        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return "Edició de post";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        
        // Verificar que l'usuari autenticat és el propietari del post
        if ($post->usuari_id !== auth()->id()) {
            abort(403, 'No tens permís per esborrar aquest post.');
        }
        
        $post->delete();
        return redirect()->route('posts.index');
    }
}