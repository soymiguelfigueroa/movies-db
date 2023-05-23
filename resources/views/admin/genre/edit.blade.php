@extends('admin.layouts.app')

@section('title', 'New Genre')

@section('content')
<section id="genre">
    <div class="card my-1 mx-auto" style="width: 90%;">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="card-title">{{ __('Editing Genre') . ': ' . $genre->name }}</h2>
            <a href="{{ route('admin.genre.index') }}" class="btn btn-primary">{{ __('Genres') }}</a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.genre.update', ['genre' => $genre->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('Name') }}*</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $genre->name }}" required>
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