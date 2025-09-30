@extends('layouts.application')

@section('title')
<x-title title="Login" />
@endsection

@section('other_css')
<link rel="stylesheet" href="{{ asset('assets/styles/demo.css') }}" />
<link rel="stylesheet" href="{{asset('assets/styles/login.css')}}" />
@endsection

@section('content')
<section id="form-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto bg-white p-5 rounded">
                <div class="text-center">
                    <h1>
                        <div style="word-spacing: 6px">Login</div>
                    </h1>
                    <p class="text-muted">Login to start learning</p>
                </div>
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control demo-input-height" name="email" :value="old('email')"
                            required autofocus autocomplete="username" placeholder="" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    
                    <div class="mb-1">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control demo-input-height" id="password"
                                placeholder="" name="password" required autocomplete="current-password" />
                            <span class="input-group-text" style="cursor: pointer;" onclick="togglePassword('password', 'togglePasswordIcon')">
                                <i id="togglePasswordIcon" class="fa fa-eye"></i>
                            </span>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="text-end">
                        @if(Route::has('password.request'))
                        <a href="{{ route('password.request') }}">Forgot Password?</a>
                        @endif
                    </div>

                    <div class="form-check">
                        <input class="form-check-input d-block" type="checkbox" value="" id="remember_me" name="remember" />
                        <label class="form-check-label rem-color" for="remember_me">
                            Remember Me
                        </label>
                    </div>

                    <button type="submit" class="watch-btn text-center w-100 mt-4">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

{{-- Toggle password script --}}
<script>
    function togglePassword(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);
        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
</script>
@endsection
