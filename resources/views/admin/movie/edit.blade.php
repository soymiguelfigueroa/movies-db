@extends('admin.layouts.app')

@section('title', 'New Movie')

@section('content')
<section id="movie">
    <div class="card my-1 mx-auto" style="width: 90%;">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="card-title">{{ __('Editing Movie') . ': ' . $movie->name }}</h2>
            <a href="{{ route('admin.movie.index') }}" class="btn btn-primary">{{ __('Movies') }}</a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.movie.update', ['movie' => $movie->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="name" class="form-label">{{ __('Name') }}*</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $movie->name }}" required>
                    </div>
                    
                    <div class="mb-3 col-2">
                        <label for="year" class="form-label">{{ __('Year') }}*</label>
                        <input type="number" class="form-control" id="year" name="year" value="{{ $movie->year }}" required>
                    </div>
                    
                    <div class="mb-3 col-2">
                        <label for="duration" class="form-label">{{ __('Duration (minutes)') }}*</label>
                        <input type="number" class="form-control" id="duration" name="duration" value="{{ $movie->duration }}" required>
                    </div>
                    
                    <div class="mb-3 col-2">
                        <label for="rating" class="form-label">{{ __('Rating') }}*</label>
                        <input type="number" class="form-control" id="rating" name="rating" value="{{ $movie->rating }}" required>
                    </div>
                </div>
                
                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="cover" class="form-label">{{ __('Cover') }}*</label>
                        <input type="file" class="form-control" id="cover" name="cover">
                    </div>
                    
                    <div class="mb-3 col-6">
                        <label for="trailer" class="form-label">{{ __('Trailer') }}*</label>
                        <input type="text" class="form-control" id="trailer" name="trailer" value="{{ $movie->trailer }}" required>
                    </div>
                </div>
                
                <div class="mb-3 col-12">
                    <label for="synopsis" class="form-label">{{ __('Synopsis') }}*</label>
                    <textarea name="synopsis" id="synopsis" cols="30" rows="5" class="form-control" required>{{ $movie->synopsis }}</textarea>
                </div>

                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="classification_id" class="form-label">{{ __('Classification') }}*</label>
                        <select name="classification_id" id="classification_id" class="form-control" required>
                            @foreach($classifications as $classification)
                            <option value="{{ $classification->id }}" {{ ($classification->id == $movie->classification_id) ? 'selected' : '' }}>{{ $classification->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-3 col-6">
                        <label for="genre" class="form-label">{{ __('Genres') }}*</label>
                        <select name="genre[]" id="genre" class="form-control" multiple required>
                            @foreach($genres as $genre)
                            <option value="{{ $genre->id }}" {{ in_array($genre->id, $movie->showGenreIds()) ? 'selected' : '' }}>{{ $genre->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-secondary">{{ __('Update') }}</button>
            </form>
        </div>
        <div class="card-footer">
            <span>{{ __('Fields with * are required') }}</span>
        </div>
    </div>
</section>
@endsection