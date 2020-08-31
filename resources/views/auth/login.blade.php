@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <h1 class="text-white text-center">Dev Challenge</h1>
    </div>
    <div>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="flex flex-col justify-between py-24" style="min-height:500px;">
                <div class="flex -mx-24">
                    <div class="md:w-1/2 px-24">
                        <div class="col-md-6">
                            <input id="username" type="text"
                                class="text-white w-full bg-transparent border-b-2 border-white @error('username') is-invalid @enderror"
                                name="username" value="{{ old('username') }}" required autocomplete="username" autofocus
                                placeholder="Username">

                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="md:w-1/2 px-24">

                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="text-white w-full bg-transparent border-b-2 border-white @error('password') is-invalid @enderror"
                                name="password" required autocomplete="current-password" placeholder="Password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="text-center">
                    <button type="submit" class="bg-yellow-400 px-20 py-3 rounded-full">Login</button>
                    <div class="py-5">
                        New to the Challenge? <a href="/register" class="text-yellow-400">Sign Up</a>
                    </div>
                </div>
            </div>


            {{-- <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>

            <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
            </label>
    </div>
</div>
</div>

<div class="form-group row mb-0">
    <div class="col-md-8 offset-md-4">
        <button type="submit" class="btn btn-primary">
            {{ __('Login') }}
        </button>

        @if (Route::has('password.request'))
        <a class="btn btn-link" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
        @endif
    </div>
</div> --}}

</form>
</div>
</div>
@endsection