@extends('layouts.application')

@section('title')
<x-title title="Parents :: Registration Form" />
@endsection

@section('other_css')
<link rel="stylesheet" href="{{ asset('assets/styles/demo.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/styles/login.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/styles/email-verification.css') }}" />
@endsection

@section('content')
<section id="form-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 mx-auto bg-white py-5 rounded">
        <div class="text-center">
          <img src="{{ asset('assets/images/email-icon.png') }}" alt="" />
          <h1>
            <div style="font-size: 30px">Please check your email.</div>
          </h1>
          <p class="code-text">
            We've sent a code to <span>Afubiodun@mail.com</span>
          </p>
        </div>
        <form action="">
          <div class="otp-input-group">
            <input type="text" maxlength="1" class="otp-input" id="otp1" />
            <input type="text" maxlength="1" class="otp-input" id="otp2" />
            <input type="text" maxlength="1" class="otp-input" id="otp3" />
            <input type="text" maxlength="1" class="otp-input" id="otp4" />
            <input type="text" maxlength="1" class="otp-input" id="otp5" />
            <input type="text" maxlength="1" class="otp-input" id="otp6" />
          </div>
          <p class="text-center resend-text">
            Didn’t get a code? <a href="">Click to resend.</a>
          </p>
          <div class="d-flex justify-content-center">
            <button type="submit" class="confirm-btn">Confirm</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>


<script src="{{ asset('assets/scripts/verification.js') }}"></script>
@endsection