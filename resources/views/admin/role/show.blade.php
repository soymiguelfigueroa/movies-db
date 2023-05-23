@extends('admin.layouts.app')

@section('title', 'New Role')

@section('content')
<section id="role">
    <div class="card my-1 mx-auto" style="width: 90%;">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="card-title">{{ __('Showing Role') . ': ' . $role->name }}</h2>
            <a href="{{ route('admin.role.index') }}" class="btn btn-primary">{{ __('Roles') }}</a>
        </div>
        <div class="card-body">
            <span class="d-block">{{ __('Id') . ': ' . $role->id }}</span>
            <span class="d-block">{{ __('Name') . ': ' . $role->name }}</span>
            <span class="d-block">{{ __('Created') . ': ' . $role->created_at }}</span>
            <span class="d-block">{{ __('Updated') . ': ' . $role->updated_at }}</span>
        </div>
        <div class="card-footer"></div>
    </div>
</section>
@endsection