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
                            required autofocus autocomplete="username" placeholder="Enter your Email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="mb-1">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control demo-input-height" id="password"
                            placeholder="Enter your Password" name="password" required
                            autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="text-end">
                        @if(Route::has('password.request'))
                        <a href="{{ route('password.request') }}">Forgot Password?</a>
                        @endif

                    </div>
                    <div class="form-check">
                        <input class="form-check-input d-block" type="checkbox" value="" id="remember_me"
                            name="remember" />
                        <label class="form-check-label rem-color" for="remember_me">
                            Remember Me
                        </label>
                    </div>
                    <button type="submit" class="watch-btn text-center w-100 mt-4">
                        Login
                    </button>
                    {{-- <div class="separator">
                        <span>OR</span>
                    </div>
                    <a class="google-sign-btn my-2" href=""><img width="23" src="./images/google-icon.png" alt="" />
                        Sign
                        Up with Google</a>
                    <div class="text-center mt-2">
                        <p class="dont-text">
                            Don’t have an account?
                            <span><a href="">Sign Up</a>
                                <img width="10" src="./images/up-arrow.png" alt="" /></span>
                        </p>
                    </div> --}}
                </form>
            </div>
        </div>
    </div>
</section>




@endsection