<x-admin-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('admin.login.store') }}">
        @csrf

        <x-application-logo class="w-25" />

        <h1 class="h3 mb-3 fw-normal">{{ __('Please sign in') }}</h1>
    
        <div class="form-floating">
          <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
          <label for="floatingInput">{{ __('Email address') }}</label>
        </div>

        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
          <label for="floatingPassword">{{ __('Password') }}</label>
        </div>
    
        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me" name="remember"> {{ __('Remember me') }}
          </label>
        </div>
        
        <button class="w-100 btn btn-lg btn-primary" type="submit">{{ __('Sign in') }}</button>
      </form>
</x-admin-guest-layout>
