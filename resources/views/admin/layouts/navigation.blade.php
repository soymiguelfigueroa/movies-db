<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('admin.index') }}">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('admin.index') }}">{{ __('Dashboard') }}</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ __('Settings') }}
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('admin.classification.index') }}">{{ __('Classifications') }}</a></li>
              <li><a class="dropdown-item" href="{{ route('admin.genre.index') }}">{{ __('Genres') }}</a></li>
              <li><a class="dropdown-item" href="{{ route('admin.role.index') }}">{{ __('Roles') }}</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
</nav>