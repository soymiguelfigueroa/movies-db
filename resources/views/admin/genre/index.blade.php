@extends('admin.layouts.app')

@section('title', 'Genres')

@section('content')
<section id="genres">
    <div class="card my-1 mx-auto" style="width: 90%;">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="card-title">{{ __('Genres') }}</h2>
            <a href="{{ route('admin.genre.create') }}" class="btn btn-primary">{{ __('Create') }}</a>
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
                        @foreach($genres as $genre)
                        <tr>
                            <td>{{ $genre->id }}</td>
                            <td>{{ $genre->name }}</td>
                            <td>{{ $genre->created_at }}</td>
                            <td>
                                <a href="{{ route('admin.genre.show', ['genre' => $genre->id]) }}" class="btn btn-secondary mb-1">{{ __('Show') }}</a>
                                <a href="{{ route('admin.genre.edit', ['genre' => $genre->id]) }}" class="btn btn-secondary mb-1">{{ __('Edit') }}</a>
                                <form action="{{ route('admin.genre.destroy', ['genre' => $genre->id]) }}" method="POST" style="display: inline;">
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
            {{ $genres->links() }}
        </div>
    </div>
</section>
@endsection