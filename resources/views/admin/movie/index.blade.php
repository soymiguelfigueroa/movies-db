@extends('admin.layouts.app')

@section('title', 'Movies')

@section('content')
<section id="movies">
    <div class="card my-1 mx-auto" style="width: 90%;">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="card-title">{{ __('Movies') }}</h2>
            <a href="{{ route('admin.movie.create') }}" class="btn btn-primary">{{ __('Create') }}</a>
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
                        @foreach($movies as $movie)
                        <tr>
                            <td>{{ $movie->id }}</td>
                            <td>{{ $movie->name }}</td>
                            <td>{{ $movie->created_at }}</td>
                            <td>
                                <a href="{{ route('admin.movie.show', ['movie' => $movie->id]) }}" class="btn btn-secondary mb-1">{{ __('Show') }}</a>
                                <a href="{{ route('admin.movie.edit', ['movie' => $movie->id]) }}" class="btn btn-secondary mb-1">{{ __('Edit') }}</a>
                                <form action="{{ route('admin.movie.destroy', ['movie' => $movie->id]) }}" method="POST" style="display: inline;">
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
            {{ $movies->links() }}
        </div>
    </div>
</section>
@endsection