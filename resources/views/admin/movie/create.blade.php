@extends('admin.layouts.app')

@section('title', 'New Movie')

@section('content')
<section id="movie">
    <div class="card my-1 mx-auto" style="width: 90%;">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="card-title">{{ __('New Movie') }}</h2>
            <a href="{{ route('admin.movie.index') }}" class="btn btn-primary">{{ __('Movies') }}</a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.movie.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="name" class="form-label">{{ __('Name') }}*</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    
                    <div class="mb-3 col-2">
                        <label for="year" class="form-label">{{ __('Year') }}*</label>
                        <input type="number" class="form-control" id="year" name="year" required>
                    </div>
                    
                    <div class="mb-3 col-2">
                        <label for="duration" class="form-label">{{ __('Duration (minutes)') }}*</label>
                        <input type="number" class="form-control" id="duration" name="duration" required>
                    </div>
                    
                    <div class="mb-3 col-2">
                        <label for="rating" class="form-label">{{ __('Rating') }}*</label>
                        <input type="number" class="form-control" id="rating" name="rating" required>
                    </div>
                </div>
                
                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="cover" class="form-label">{{ __('Cover') }}*</label>
                        <input type="file" class="form-control" id="cover" name="cover" required>
                    </div>
                    
                    <div class="mb-3 col-6">
                        <label for="trailer" class="form-label">{{ __('Trailer') }}*</label>
                        <input type="text" class="form-control" id="trailer" name="trailer" required>
                    </div>
                </div>
                
                <div class="mb-3 col-12">
                    <label for="synopsis" class="form-label">{{ __('Synopsis') }}*</label>
                    <textarea name="synopsis" id="synopsis" cols="30" rows="5" class="form-control" required></textarea>
                </div>

                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="classification-id" class="form-label">{{ __('Classification') }}*</label>
                        <select name="classification_id" id="classification-id" class="form-control" required>
                            @foreach($classifications as $classification)
                            <option value="{{ $classification->id }}">{{ $classification->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-3 col-6">
                        <label for="genre" class="form-label">{{ __('Genres') }}*</label>
                        <select name="genre[]" id="genre" class="form-control" multiple required>
                            @foreach($genres as $genre)
                            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-secondary">{{ __('Store') }}</button>
            </form>
        </div>
        <div class="card-footer">
            <span>{{ __('Fields with * are required') }}</span>
        </div>
    </div>
</section>
@endsection