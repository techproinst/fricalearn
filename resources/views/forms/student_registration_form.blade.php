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
        <form action="{{ route('student.store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control demo-input-height" id="name" placeholder="Enter your Name"
              name="name" value="{{ old('name') }}" />
            @error('name')
            <span class="text-danger">
              {{ $message }}
            </span>
            @enderror

          </div>
          <div class="mb-3">
            <label for="Birthday" class="form-label">Birthday</label>
            <input type="date" class="form-control demo-input-height" id="Birthday" placeholder="e.g. December 29 "
              name="birthday" value="{{ old('birthday') }}" />
            @error('birthday')
            <span class="text-danger">
              {{ $message }}
            </span>
            @enderror
          </div>
          <div class="mb-3">


            <label for="gender" class="form-label">Gender</label>
            <select class="form-select demo-input-height mb-3" aria-label="gender" id="gender" name="gender">
              <option value="">--Select Gender</option>
              <option value="male">male</option>
              <option value="female">female</option>
            </select>
            @error('gender')
            <span class="text-danger">
              {{ $message }}
            </span>
            @enderror
          </div>

          <div class="mb-3">
            <label for="course_id" class="form-label">Select Course</label>
            <select class="form-select demo-input-height mb-3" aria-label="course_id" id="course_id" name="course_id">
              <option value=''>--Select Course</option>
              @foreach ($courses as $course )
              <option value="{{ $course->id }}" {{ old('course_id')==$course->id ? 'selected' : '' }}>{{ $course->name
                }}</option>
              @endforeach
            </select>
            @error('course_id')
            <span class="text-danger">
              {{ $message }}
            </span>
            @enderror
          </div>
          <div class="mb-3">


            <label for="course_level" class="form-label">Select Course Level</label>
            <select class="form-select demo-input-height mb-3" aria-label="level" id="level" name="course_level">
              <option value=''>--Select Level</option>
              @foreach ($levels as $level )
              <option value="{{ $level }}" {{ old('level')==$level ? 'selected' : '' }}>{{ $level}}</option>
              @endforeach
            </select>
            @error('course_level')
            <span class="text-danger">
              {{ $message }}
            </span>
            @enderror
          </div>


          <button type="submit" class="watch-btn text-center w-100 mt-1 my-2">
            Proceed
          </button>


          <a class="google-sign-btn my-2" href=""> Cancel</a>
        </form>
      </div>
    </div>
  </div>
</section>


@endsection