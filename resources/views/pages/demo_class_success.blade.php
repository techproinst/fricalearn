@extends('layouts.application')

@section('title')
<x-title title="Demo :: Form" />
@endsection

@section('other_css')
<link rel="stylesheet" href="{{ asset('assets/styles/success.css') }}" />
@endsection

@section('content')
<section id="success-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 mx-auto bg-white p-5 rounded text-center">
        <h1>
          <div>You're All Set! 🎉</div>
        </h1>
        <p>
          Thank you for signing up! Check your email for the class link and
          get ready for a fun and engaging language learning experience.If
          you don’t see the email, check your spam folder or contact our
          support team. See you in class! 🚀
        </p>

        <a class="start-btn mt-2" href="https://youtube.com">Start Class</a>
      </div>
    </div>
  </div>
</section>


@endsection