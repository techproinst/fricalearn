@extends('layouts.application')

@section('title')
<x-title title="Parents :: Registration Form" />
@endsection

@section('other_css')
<link rel="stylesheet" href="{{ asset('assets/styles/demo.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/styles/login.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/styles/sign-up.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@25.3.0/build/css/intlTelInput.css" />
@endsection

@section('content')
<section id="form-section">
  <div class="container">
    <div class="row mx-1">
      <div class="col-lg-6  mx-auto bg-white p-5 rounded">
        <div class="text-center">
          <h1>
            <div style="word-spacing: 6px">Sign Up</div>
          </h1>
          <p class="text-muted">
            Create an account for your kid to start learning.
          </p>
        </div>
        <form action="{{ route('parent.registration.store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="full_name" class="form-label">Full Name</label>
            <input type="text" class="form-control demo-input-height" id="fullname" placeholder="Enter your Name"
              name="name" value="{{ old('name') }}" />
            <span class="text-danger">
              @error('name')
              {{ $message }}

              @enderror

            </span>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control demo-input-height" id="email" placeholder="Enter your Email"
              name="email" value="{{ old('email') }}" />
            <span class="text-danger">
              @error('email')
              {{ $message }}

              @enderror

            </span>

          </div>
          <div class="mb-2">
            <label for="phone" class="form-label">Phone Number</label><br />
            <input type="tel" class="form-control demo-input-height w-100" id="phone" placeholder="(234) 000 000 0000"
              name="phone" value="{{ old('phone') }}" />
            <span class="text-danger">
              @error('phone')
              {{ $message }}

              @enderror

            </span>

          </div>

          <div class="mb-2">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control demo-input-height" id="password"
              placeholder="Enter your Password" name="password" value="{{ old('password') }}" />
            <span class="text-danger">
              @error('password')
              {{ $message }}

              @enderror

            </span>

          </div>
          <div class="mb-2">
            <label for="confirm_password" class="form-label">Confirm Password</label>
            <input type="password" class="form-control demo-input-height" id="confirm-password"
              placeholder="Enter your Password" name="confirm_password" value="{{ old('password') }}" />
            <span class="text-danger">
              @error('confirm_password')
              {{ $message }}

              @enderror

            </span>

          </div>
          <div class="form-check my-3">
            <input class="form-check-input d-block" type="checkbox" name="terms"
              value="1" {{ old('terms') ? 'checked' : '' }} />
            <label class="form-check-label" for="flexCheckDefault">
              <span>I agree with </span><a href="">Terms of Use</a>
              <span>and</span>
              <a href="">Privacy Policy</a>
            </label>
            <span class="text-danger">
              @error('terms')
              {{ $message }}

              @enderror

            </span>
          </div>
          <button type="submit" class="watch-btn text-center w-100 mt-1 my-2">
            Sign Up
          </button>
          <div class="separator my-2">
            <span>OR</span>
          </div>
          <a class="google-sign-btn my-2" href="{{ route('auth.google') }}"><img width="23"
              src="{{ asset('assets/images/google-icon.png') }}" alt="" /> Sign
            Up with Google</a>
          <div class="text-center mt-2">
            <p class="dont-text">
              Already have an account?
              <span><a href="">Login</a>
                <img width="10" src="{{ asset('assets/images/up-arrow.png') }}" alt="" /></span>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@25.3.0/build/js/intlTelInput.min.js"></script>
<script src="{{ asset('assets/scripts/phone_input.js') }}"></script>
@endsection