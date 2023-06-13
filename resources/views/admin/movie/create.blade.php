@extends('admin.layouts.app')

@section('title', 'New Movie')

@section('content')
<section id="movie">
    <div class="card my-1 mx-auto" style="width: 90%;">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="card-title">{{ __('New Movie') }}</h2>
            <a href="{{ route('admin.movie.index') }}" class="btn btn-primary">{{ __('Movies') }}</a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.movie.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="name" class="form-label">{{ __('Name') }}*</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    
                    <div class="mb-3 col-2">
                        <label for="year" class="form-label">{{ __('Year') }}*</label>
                        <input type="number" class="form-control" id="year" name="year" required>
                    </div>
                    
                    <div class="mb-3 col-2">
                        <label for="duration" class="form-label">{{ __('Duration') }}*</label>
                        <input type="number" class="form-control" id="duration" name="duration" required>
                    </div>
                    
                    <div class="mb-3 col-2">
                        <label for="rating" class="form-label">{{ __('Rating') }}*</label>
                        <input type="number" class="form-control" id="rating" name="rating" required>
                    </div>
                </div>
                
                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="cover" class="form-label">{{ __('Cover') }}*</label>
                        <input type="file" class="form-control" id="cover" name="cover" required>
                    </div>
                    
                    <div class="mb-3 col-6">
                        <label for="trailer" class="form-label">{{ __('Trailer') }}*</label>
                        <input type="text" class="form-control" id="trailer" name="trailer" required>
                    </div>
                </div>
                
                <div class="mb-3 col-12">
                    <label for="synopsis" class="form-label">{{ __('Synopsis') }}*</label>
                    <textarea name="synopsis" id="synopsis" cols="30" rows="5" class="form-control" required></textarea>
                </div>

                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="classification-id" class="form-label">{{ __('Classification') }}*</label>
                        <select name="classification_id" id="classification-id" class="form-control" required>
                            @foreach($classifications as $classification)
                            <option value="{{ $classification->id }}">{{ $classification->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-3 col-6">
                        <label for="genre" class="form-label">{{ __('Genres') }}*</label>
                        <select name="genre[]" id="genre" class="form-control" multiple required>
                            @foreach($genres as $genre)
                            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="role-id" class="form-label">{{ __('Role') }}*</label>
                        <select name="role_id" id="role-id" class="form-control" required>
                            <option value="">{{ __('Select a role') }}</option>
                            @foreach($roles as $role)
                            <option value="{{ $role->id }}"  data-href="{{ route('admin.movie.get_employees_from_role', ['role' => $role->id]) }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3 col-6">
                        <label for="employees" class="form-label">{{ __('Employees') }}*</label>
                        <select name="employees[]" id="employees" class="form-control" multiple disabled required>
                            <option value="">{{ __('You need to select a role') }}</option>
                        </select>
                        <button type="button" class="btn btn-secondary my-2" id="btn-add-to-list">{{ __('Add to list') }}</button>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-12">
                        <label for="employees-list" class="form-label">{{ __('Employees list') }}*</label>
                        <input type="text" name="employees_list" id="empoyees-list" class="form-control" />
                    </div>
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

@section('script')
<script>
    let $select_role = document.getElementById("role-id");
    let $select_employees = document.getElementById('employees');
    let $btn_add_to_list = document.getElementById('btn-add-to-list');
    let employees_selected = [];

    $select_role.addEventListener('change', (event) => {
        let role_id = $select_role.value;
        let href = event.target.options[event.target.selectedIndex].dataset.href;

        // Disabling select
        $select_employees.setAttribute("disabled", "disabled");

        if (role_id) {
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                let response = JSON.parse(this.response);
                
                if (response.employees) {
                    // Cleaning options
                    let i, L = $select_employees.options.length - 1;
                    for(i = L; i >= 0; i--) {
                        $select_employees.remove(i);
                    }
                    // Adding options
                    response.employees.map(item => $select_employees.appendChild(new Option(item.name, item.id)).cloneNode(true));
                    // Enabling select
                    $select_employees.removeAttribute("disabled");
                }
            }
            xhttp.open("GET", href);
            xhttp.send(); 
        }
    });

    $btn_add_to_list.addEventListener('click', (event) => {
        let employees = getSelectValues($select_employees);
        let $input_empoyees_list = document.getElementById('empoyees-list');
        $input_empoyees_list.value = employees.toString();
    });

    function getSelectValues(select) {
        var result = [];
        var options = select && select.options;
        var opt;

        for (var i=0, iLen=options.length; i<iLen; i++) {
            opt = options[i];

            if (opt.selected) {
            result.push(opt.value || opt.text);
            }
        }
        return result;
    }
</script>
@endsection