@extends('admin.layouts.app')

@section('title', 'New Movie')

@section('content')
<section id="movie">
    <div class="card my-1 mx-auto" style="width: 90%;">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="card-title">{{ __('Showing Movie') . ': ' . $movie->name }}</h2>
            <a href="{{ route('admin.movie.index') }}" class="btn btn-primary">{{ __('Movies') }}</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <h2>{{ __('Data') }}</h2>
                    <span class="d-block">{{ __('Id') . ': ' . $movie->id }}</span>
                    <span class="d-block">{{ __('Name') . ': ' . $movie->name }}</span>
                    <span class="d-block">{{ __('Year') . ': ' . $movie->year }}</span>
                    <span class="d-block">{{ __('Rating') . ': ' . $movie->rating }}</span>
                    <span class="d-block">{{ __('Synopsis') . ': ' . $movie->synopsis }}</span>
                    <span class="d-block">{{ __('Classification') . ': ' . $movie->classification->name }}</span>
                    <span class="d-block">{{ __('Created') . ': ' . $movie->created_at }}</span>
                    <span class="d-block">{{ __('Updated') . ': ' . $movie->updated_at }}</span>
                    <h2>{{ __('Genres') }}</h2>
                    <ul>
                        @foreach ($movie->genres as $genre)
                        <li>{{ $genre->name }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-6">
                    <h2>{{ __('Cover') }}</h2>
                    <img src="{{ $movie->cover }}" alt="{{ $movie->name }}" class="img-thumbnail">
                    <h2>{{ __('Trailer') }}</h2>
                    <iframe width="100%" height="315" src="{{ $movie->trailer }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <div class="card-footer"></div>
    </div>
</section>
@endsection