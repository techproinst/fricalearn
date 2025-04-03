
@extends('layouts.application')

@section('title')
<x-title title="Forgot :: Password" />
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
                        <div style="word-spacing: 6px">Forgot Password</div>
                    </h1>
                    <p class="text-muted">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
                </div>
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control demo-input-height" name="email" :value="old('email')"
                            required autofocus autocomplete="username" placeholder="Enter your Email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                  
                    
                    <button type="submit" class="watch-btn text-center w-100 mt-4">
                        Email Password Reset Link
                    </button>
                    
                </form>
            </div>
        </div>
    </div>
</section>




@endsection 
