@extends('admin.layouts.app')

@section('title', 'New Genre')

@section('content')
<section id="genre">
    <div class="card my-1 mx-auto" style="width: 90%;">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="card-title">{{ __('Showing Genre') . ': ' . $genre->name }}</h2>
            <a href="{{ route('admin.genre.index') }}" class="btn btn-primary">{{ __('Genres') }}</a>
        </div>
        <div class="card-body">
            <span class="d-block">{{ __('Id') . ': ' . $genre->id }}</span>
            <span class="d-block">{{ __('Name') . ': ' . $genre->name }}</span>
            <span class="d-block">{{ __('Created') . ': ' . $genre->created_at }}</span>
            <span class="d-block">{{ __('Updated') . ': ' . $genre->updated_at }}</span>
        </div>
        <div class="card-footer"></div>
    </div>
</section>
@endsection