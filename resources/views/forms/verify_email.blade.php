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
    <div class="row mx-1">
      <div class="col-lg-6 mx-auto bg-white py-5 rounded">
        <div class="text-center">
          <img src="{{ asset('assets/images/email-icon.png') }}" alt="" />
          <h1>
            <div style="font-size: 30px">Please check your email.</div>
          </h1>
          <p class="code-text">
            We've sent a code to <span>{{ $parent->email }}</span>
          </p>
        </div>
        <form action="{{ route('otp.submit') }}" method="POST">
          @csrf
          @if ($errors->any())
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
          @endif

          <div class="otp-input-group">
            <input type="text" maxlength="1" class="otp-input" id="otp1" name="otp_1" required />
            <input type="text" maxlength="1" class="otp-input" id="otp2" name="otp_2" required />
            <input type="text" maxlength="1" class="otp-input" id="otp3" name="otp_3" required />
            <input type="text" maxlength="1" class="otp-input" id="otp4" name="otp_4" required />
            <input type="text" maxlength="1" class="otp-input" id="otp5" name="otp_5" required />
            <input type="text" maxlength="1" class="otp-input" id="otp6" name="otp_6" required />
          </div>
          <input type="email" value="{{ $parent->email }}" name="email" hidden>
          <p class="text-center resend-text">
            Didn’t get a code? <a href="{{ route('otp.resend',['parent' => $parent]) }}">Click to resend.</a>
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