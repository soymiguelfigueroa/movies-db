@extends('admin.layouts.app')

@section('title', 'New Classification')

@section('content')
<section id="classification">
    <div class="card my-1 mx-auto" style="width: 90%;">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="card-title">{{ __('Showing Classification') . ': ' . $classification->name }}</h2>
            <a href="{{ route('admin.classification.index') }}" class="btn btn-primary">{{ __('Classifications') }}</a>
        </div>
        <div class="card-body">
            <span class="d-block">{{ __('Id') . ': ' . $classification->id }}</span>
            <span class="d-block">{{ __('Name') . ': ' . $classification->name }}</span>
            <span class="d-block">{{ __('Created') . ': ' . $classification->created_at }}</span>
            <span class="d-block">{{ __('Updated') . ': ' . $classification->updated_at }}</span>
        </div>
        <div class="card-footer"></div>
    </div>
</section>
@endsection