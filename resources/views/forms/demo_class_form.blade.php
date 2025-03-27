@extends('layouts.application')

@section('title')
<x-title title="Demo :: Form" />
@endsection

@section('other_css')
<link rel="stylesheet" href="{{ asset('assets/styles/demo.css') }}" />
@endsection

@section('content')
<section id="form-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 mx-auto bg-white p-5 rounded">
        <div class="text-center">
          <h1>
            <div style="word-spacing: 6px">Demo Classes</div>
          </h1>
          <p class="text-muted">Sign Up For Our Demo Classes</p>
        </div>
        <form action="">
          <div class="mb-3">
            <label for="fullname" class="form-label">Full Name</label>
            <input type="text" class="form-control demo-input-height" id="fullname" placeholder="Enter your Name" />
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control demo-input-height" id="email" placeholder="Enter your Email" />
          </div>
          <div class="mb-3">
            <label for="mobile-number" class="form-label">Mobile Number</label>
            <input type="text" class="form-control demo-input-height" id="mobile-number"
              placeholder="Enter your Mobile Number" />
          </div>
          <label for="mobile-number" class="form-label">Select Course</label>
          <select class="form-select demo-input-height mb-3" aria-label="Default select example">
            <option selected>-- Select Course --</option>
            <option value="1">Yoruba</option>
            <option value="2">Hausa</option>
            <option value="3">Igbo</option>
          </select>

          <div class="form-check mb-3">
            <input class="form-check-input d-block" type="checkbox" value="" id="flexCheckDefault" />
            <label class="form-check-label" for="flexCheckDefault">
              I agree with <a href="">Terms of Use</a> and
              <a href="">Privacy Policy</a>
            </label>
          </div>

          <button class="watch-btn text-center w-100 mt-1">
            Watch Demo Class
          </button>
        </form>
      </div>
    </div>
  </div>
</section>


@endsection