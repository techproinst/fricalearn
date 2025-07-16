@extends('layouts.application')

@section('title')
<x-title title="Demo :: Form" />
@endsection

@section('other_css')
<link rel="stylesheet" href="{{ asset('assets/styles/demo.css') }}" />
@endsection

@if(session('error'))
<script>
  alert("{{ session('error') }}")

</script> {{-- Temporary debug --}}
@endif


@section('content')
<section id="form-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 mx-auto">
        <div class="card bg-white p-5 rounded border-white">
        <div class="text-center">
          <h1>
            <div style="word-spacing: 6px">Free Classes</div>
          </h1>
          <p class="text-muted">Sign Up For Our Free Classes</p>
        </div>
        <form action="{{ route('demo_class.store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="fullname" class="form-label">Full Name</label>
            <input type="text" class="form-control demo-input-height" id="fullname" placeholder="Enter your Name" value="{{ old('name') }}" name="name" />
            <span class="text-danger">
              @error('name')
              {{ $message }}
              @enderror
            </span>

          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control demo-input-height" id="email" placeholder="Enter your Email" name="email" value="{{ old('email') }}" />
            <span class="text-danger">
              @error('email')
              {{ $message }}
              @enderror
            </span>
          </div>
          <div class="mb-3">
            <label for="mobile-number" class="form-label">Mobile Number</label>
            <input type="text" class="form-control demo-input-height" id="mobile-number" placeholder="Enter your Mobile Number" name="phone" value="{{ old('phone') }}" />
            <span class="text-danger">
              @error('phone')
              {{ $message }}
              @enderror
            </span>
          </div>
          <div class="mb-2">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control demo-input-height" id="password" placeholder="Enter your Password" name="password" value="{{ old('password') }}" />
            <span class="text-danger">
              @error('password')
              {{ $message }}

              @enderror

            </span>
          </div>
          <div class="mb-2">
            <label for="confirm_password" class="form-label">Confirm Password</label>
            <input type="password" class="form-control demo-input-height" id="confirm-password" placeholder="Enter your Password" name="confirm_password" value="{{ old('password') }}" />
            <span class="text-danger">
              @error('confirm_password')
              {{ $message }}

              @enderror

            </span>

          </div>
          <label for="courses" class="form-label">Select Course</label>
          <select class="form-select demo-input-height mb-3" aria-label="courses" name="course_id">
            <option value="">-- Select Course --</option>
            @foreach ($courses as $course)
            <option value="{{ $course->id }}" {{ old('course_id')==$course->id ? 'selected' : '' }}>{{ $course->name }}
            </option>
            @endforeach
          </select>
          <span class="text-danger">
            @error('course_id')
            {{ $message }}
            @enderror
          </span>

          <div class="form-check mb-3">
            <input class="form-check-input d-block" type="checkbox" id="flexCheckDefault" name="terms" />
            <label class="form-check-label" for="flexCheckDefault">
              I agree with <a href="">Terms of Use</a> and
              <a href="">Privacy Policy</a>
            </label>
            <span class="text-danger">
              @error('terms')
              {{ $message }}
              @enderror
            </span>
          </div>

          <button type="submit" class="watch-btn text-center w-100 mt-1">
            Watch Free Class
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
</section>


@endsection
