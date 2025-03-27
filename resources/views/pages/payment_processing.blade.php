@extends('layouts.application')

@section('title')
<x-title title="Payments :: Processing" />
@endsection

@section('other_css')
<link rel="stylesheet" href="{{ asset('assets/styles/demo.css') }}" />

@endsection

@section('content')
<section id="form-section">
  <div class="container">
    <div class="row my-5">
      <div class="col-lg-6 mx-auto bg-white p-5 rounded">
        <div class="text-center">
          <h1>
            <div>Payment Processing</div>
          </h1>
          <p class="text-muted">
            Your payment is being processed. Once verified, you’ll receive
            an email with your child’s login details and class schedule.
            Thank you for choosing us!🚀
          </p>
        </div>
      </div>
    </div>
  </div>
</section>




@endsection