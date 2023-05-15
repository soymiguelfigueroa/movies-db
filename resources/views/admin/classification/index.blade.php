@extends('admin.layouts.app')

@section('title', 'Classifications')

@section('content')
<section id="classifications">
    <div class="card my-1 mx-auto" style="width: 90%;">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="card-title">{{ __('Classifications') }}</h2>
            <a href="{{ route('admin.classification.create') }}" class="btn btn-primary">{{ __('Create') }}</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($classifications as $classification)
                        <tr>
                            <td>{{ $classification->id }}</td>
                            <td>{{ $classification->name }}</td>
                            <td>{{ $classification->created_at }}</td>
                            <td>
                                <a href="{{ route('admin.classification.show', ['classification' => $classification->id]) }}" class="btn btn-secondary mb-1">{{ __('Show') }}</a>
                                <a href="{{ route('admin.classification.edit', ['classification' => $classification->id]) }}" class="btn btn-secondary mb-1">{{ __('Edit') }}</a>
                                <form action="{{ route('admin.classification.destroy', ['classification' => $classification->id]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger mb-1" onclick="return confirm('{{ __('Do you want to delete this record?') }}')">{{ __('Delete') }}</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{ $classifications->links() }}
        </div>
    </div>
</section>
@endsection