@extends('admin.layouts.app')

@section('title', 'New Employee')

@section('content')
<section id="employee">
    <div class="card my-1 mx-auto" style="width: 90%;">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="card-title">{{ __('Showing Employee') . ': ' . $employee->name }}</h2>
            <a href="{{ route('admin.employee.index') }}" class="btn btn-primary">{{ __('Employees') }}</a>
        </div>
        <div class="card-body">
            <span class="d-block">{{ __('Id') . ': ' . $employee->id }}</span>
            <span class="d-block">{{ __('Name') . ': ' . $employee->name }}</span>
            <span class="d-block">{{ __('Created') . ': ' . $employee->created_at }}</span>
            <span class="d-block">{{ __('Updated') . ': ' . $employee->updated_at }}</span>
        </div>
        <div class="card-footer"></div>
    </div>
</section>
@endsection