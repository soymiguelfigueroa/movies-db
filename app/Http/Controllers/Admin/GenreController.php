<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\GenreController as MainGenreController;
use App\Http\Requests\StoreGenreRequest;
use App\Http\Requests\UpdateGenreRequest;
use App\Models\Genre;

class GenreController extends MainGenreController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::paginate();

        return view('admin.genre.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.genre.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGenreRequest $request)
    {
        $validated = $request->validated();

        $genre = new Genre;
        $genre->name = $validated['name'];
        if ($genre->save()) {
            return redirect(route('admin.genre.index'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        return view('admin.genre.show', compact('genre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        return view('admin.genre.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGenreRequest $request, Genre $genre)
    {
        $validated = $request->validated();

        $genre->name = $validated['name'];
        if ($genre->save()) {
            return redirect(route('admin.genre.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        if ($genre->delete()) {
            return redirect(route('admin.genre.index'));
        }
    }
}
