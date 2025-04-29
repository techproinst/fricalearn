@extends('layouts.application')

@section('title')
<x-title title="Payments" />
@endsection

@section('other_css')
<link rel="stylesheet" href="{{ asset('assets/styles/demo.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/styles/payment.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/styles/file-upload.css') }}">
@endsection

@section('content')
<section id="form-section">
  <div class="container">
    <div class="row mx-1">
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
          <button class=" africa-btn account {{ $continent == 'africa' ? 'clicked' : ''}}">Naira Account</button>
          <button class="other-btn account">Pounds Account</button>
        </div>
        <div class="my-4 p-3 details-wrapper africa-details">
          <button class="bank-btn">Bank Name</button>
          <h1 class="text-center py-3 text-color">
            <div>&#8358; {{number_format($amount['africa'])}}</div>
          </h1>
          <div class="text-center py-3 acc-details">
            <p>Account Number</p>
            <p>Account Name</p>
          </div>
        </div>
        <div class="my-4 p-3 details-wrapper other-details">
          <button class="bank-btn">Bank Name</button>
          <h1 class="text-center py-3 text-color">
            <div>$ {{number_format($amount['other']) }}</div>
          </h1>
          <div class="text-center py-3 acc-details">
            <p>Account Number</p>
            <p>Account Name</p>
          </div>
        </div>
        <div>
          <form action="{{ route('payment.store', ['student' => $student->id ]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="course" class="form-label">Upload receipt</label>
            <div class="custom-file-upload">
              <label for="receiptUpload" class="custom-upload-label">
                <span class="file-name">File Name</span>
                <span class="upload-text">Upload</span>
              </label>
              <input type="file" id="upload" class="custom-file-input" name="payment_receipt" required/>
              <input type="text" name="student_id" value="{{ $student->id }}" hidden>
              <input type="text" name="amount" value="{{ $amount[$continent] }}" hidden>
              <input type="text" name="continent" value="{{ $continent }}" hidden>
            </div>
            @error('payment_receipt')
            <span class="text-danger">
              {{ $message}}
            </span>
            @enderror
            <button type="submit" class="watch-btn text-center w-100 mt-3">
              Proceed
            </button>
            <a class="cancel-btn my-3" href=""> Cancel</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="{{ asset('assets/scripts/payment.js') }}"></script>
<script src="{{ asset('assets/scripts/file-upload.js') }}"></script>


@endsection