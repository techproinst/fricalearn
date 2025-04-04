@extends('layouts.application')

@section('title')
<x-title title="Payments" />
@endsection

@section('other_css')
<link rel="stylesheet" href="{{ asset('assets/styles/demo.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/styles/payment.css') }}" />
@endsection

@section('content')
<section id="form-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 mx-auto bg-white p-5 rounded">
        <div class="text-center">
          <h1>
            <div>Payment Details</div>
          </h1>
          <p class="text-muted">
            Make payment into the account below and upload your receipt for
            confirmation.🚀
          </p>
        </div>
        <div class="text-center currency-wrapper border py-2 mx-5">
          <button class="naira-btn account">Naira Account</button>
          <button class="pounds-btn account">Pounds Account</button>
        </div>
        <div class="my-4 p-3 details-wrapper naira-details">
          <button class="bank-btn">Bank Name</button>
          <h1 class="text-center py-3 text-color">
            <div>₦ 30,000</div>
          </h1>
          <div class="text-center py-3 acc-details">
            <p>Account Number</p>
            <p>Account Name</p>
          </div>
        </div>
        <div class="my-4 p-3 details-wrapper pounds-details">
          <button class="bank-btn">Bank Name</button>
          <h1 class="text-center py-3 text-color">
            <div>£ 15.50</div>
          </h1>
          <div class="text-center py-3 acc-details">
            <p>Account Number</p>
            <p>Account Name</p>
          </div>
        </div>
        <div>
          <label for="course" class="form-label">Upload receipt</label>
          <div class="custom-file-upload">
            <label for="receiptUpload" class="custom-upload-label">
              <span class="file-name">File Name</span>
              <span class="upload-text">Upload</span>
            </label>
            <input type="file" id="receiptUpload" class="custom-file-input" />
          </div>
          {{-- <button type="submit" class="watch-btn text-center w-100 mt-3">
            Proceed
          </button> --}}
          <a class="watch-btn text-center w-100 mt-3" href="{{ url('/payment-processing') }}">Proceed</a>

          <a class="cancel-btn my-3" href=""> Cancel</a>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="{{ asset('assets/scripts/payment.js') }}"></script>


@endsection