@extends('admin.layouts.app')

@section('title', 'New Classification')

@section('content')
<section id="classification">
    <div class="card my-1 mx-auto" style="width: 90%;">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="card-title">{{ __('New Classification') }}</h2>
            <a href="{{ route('admin.classification.index') }}" class="btn btn-primary">{{ __('Classifications') }}</a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.classification.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('Name') }}*</label>
                    <input type="text" class="form-control" id="name" name="name" required>
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