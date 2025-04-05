@extends('layouts.application')

@section('title')
<x-title title="Student :: Registration Form" />
@endsection

@section('other_css')
<link rel="stylesheet" href="{{ asset('assets/styles/demo.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/styles/login.css') }}" />
@endsection

@section('content')
<section id="form-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 mx-auto bg-white p-5 rounded">
        <div class="text-center">
          <h1>
            <div>Enter Kids Details</div>
          </h1>
          <p class="text-muted">
            Once you complete payment, we’ll email your child’s login
            details, class schedule, andlearning materials—check your inbox
            or spam folder! 🚀
          </p>
        </div>
        <form action="">
          <div class="mb-3">
            <label for="fullname" class="form-label">Full Name</label>
            <input
              type="email"
              class="form-control demo-input-height"
              id="fullname"
              placeholder="Enter your Name"
            />
          </div>
          <div class="mb-3">
            <label for="Birthday" class="form-label">Birthday</label>
            <input
              type="date"
              class="form-control demo-input-height"
              id="Birthday"
              placeholder="e.g. December 29 "
            />
          </div>
          <label for="Gender" class="form-label">Gender</label>
          <select
            class="form-select demo-input-height mb-3"
            aria-label="Default select example"
          >
            <option selected>Select Gender</option>
            <option value="1">Male</option>
            <option value="2">Female</option>
          </select>
          <label for="course" class="form-label">Select Course</label>
          <select
            class="form-select demo-input-height mb-3"
            aria-label="Default select example"
          >
            <option selected>Select Course</option>
            <option value="1">Yoruba</option>
            <option value="2">Hausa</option>
            <option value="3">Igbo</option>
          </select>

          {{-- <button
            type="submit"
            class="watch-btn text-center w-100 mt-1 my-2"
          >
            Proceed
          </button> --}}
          <a  class="watch-btn text-center w-100 mt-1 my-2" href="{{ url('/select-class-schedule') }}">Proceed</a>

          <a class="google-sign-btn my-2" href=""> Cancel</a>
        </form>
      </div>
    </div>
  </div>
</section>


@endsection