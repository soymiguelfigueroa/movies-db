<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\MovieController as MainMovieController;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Movie;
use App\Models\Classification;
use App\Models\Genre;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MovieController extends MainMovieController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::paginate();

        return view('admin.movie.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classifications = Classification::all();
        $genres = Genre::all();

        return view('admin.movie.create', compact('classifications', 'genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovieRequest $request)
    {
        $validated = $request->validated();

        $movie = new Movie;
        $movie->name = $validated['name'];
        $movie->year = $validated['year'];
        $movie->duration = $validated['duration'];
        $movie->rating = $validated['rating'];
        $movie->cover = $request->file('cover')->store('public');
        $movie->trailer = $validated['trailer'];
        $movie->synopsis = $validated['synopsis'];
        $movie->classification_id = $validated['classification_id'];
        if ($movie->save()) {
            $movie->genres()->attach($validated['genre']);
            
            return redirect(route('admin.movie.index'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        return view('admin.movie.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        $classifications = Classification::all();
        $genres = Genre::all();

        return view('admin.movie.edit', compact('movie', 'classifications', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        $validated = $request->validated();

        $movie->name = $validated['name'];
        $movie->year = $validated['year'];
        $movie->duration = $validated['duration'];
        $movie->rating = $validated['rating'];
        $movie->trailer = $validated['trailer'];
        $movie->synopsis = $validated['synopsis'];
        $movie->classification_id = $validated['classification_id'];

        if ($request->file('cover')) {
            if ($movie->cover)
                Storage::delete($movie->cover);

            $movie->cover = $request->file('cover')->store('public');
        }

        if ($movie->save()) {
            $movie->genres()->sync($validated['genre']);
            
            return redirect(route('admin.movie.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        if ($movie->cover)
            Storage::delete(Str::replace('storage', 'public', $movie->cover));

        $movie->genres()->detach();
        
        if ($movie->delete()) {
            return redirect(route('admin.movie.index'));
        }
    }
}
