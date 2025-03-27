@extends('layouts.application')

@section('title')
<x-title title="Class :: Schedule" />
@endsection

@section('other_css')
<link rel="stylesheet" href="{{ asset('assets/styles/class-schedule.css') }}" />
@endsection

@section('content')
<section id="form-section">
  <div class="container">
    <div class="text-center mb-4">
      <h1>
        <div>Select Class Schedule</div>
      </h1>
      <p>
        Choose a class schedule that works best for your child! Select a
        convenient time <br />
        for their lessons and ensure a smooth and enjoyable learning
        experience.
      </p>
    </div>
    <form action="" method="">
      <input type="hidden" name="monday_time" id="monday_time" />
      <input type="hidden" name="wednesday_time" id="wednesday_time" />
      <input type="hidden" name="friday_time" id="friday_time" />

      <div class="row g-4 justify-content-center">
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
          <div class="card border-none" data-day="Monday">
            <div class="card-body p-5">
              <h5 class="card-title custom-title">Monday</h5>
              <h6 class="py-3 avail-text">Available Time</h6>
              <div class="time-wrapper p-3" data-day="Monday" data-time="12:00 WAT">
                <h6 class="time-text">Time</h6>
                <h6>12:00 WAT</h6>
                <button type="button" class="timer-btn">
                  <img src="{{ asset('assets/images/timer.png') }}" alt="" /> 45 Minutes
                </button>
              </div>
              <div class="time-wrapper p-3 mt-3" data-day="Monday" data-time="4:00 WAT">
                <h6 class="time-text">Time</h6>
                <h6>4:00 WAT</h6>
                <button type="button" class="timer-btn">
                  <img src="{{ asset('assets/images/timer.png') }}" alt="" /> 45 Minutes
                </button>
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
          <div class="card border-none" data-day="Wednesday">
            <div class="card-body p-5">
              <h5 class="card-title custom-title">Wednesday</h5>
              <h6 class="py-3 avail-text">Available Time</h6>
              <div class="time-wrapper p-3" data-day="Wednesday" data-time="12:00 WAT">
                <h6 class="time-text">Time</h6>
                <h6>12:00 WAT</h6>
                <button type="button" class="timer-btn">
                  <img src="{{ asset('assets/images/timer.png') }}" alt="" /> 45 Minutes
                </button>
              </div>
              <div class="time-wrapper p-3 mt-3" data-day="Wednesday" data-time="4:00 WAT">
                <h6 class="time-text">Time</h6>
                <h6>4:00 WAT</h6>
                <button type="button" class="timer-btn">
                  <img src="{{ asset('assets/images/timer.png') }}" alt="" /> 45 Minutes
                </button>
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
          <div class="card border-none" data-day="Friday">
            <div class="card-body p-5">
              <h5 class="card-title custom-title">Friday</h5>
              <h6 class="py-3 avail-text">Available Time</h6>
              <div class="time-wrapper p-3" data-day="Friday" data-time="12:00 WAT">
                <h6 class="time-text">Time</h6>
                <h6>12:00 WAT</h6>
                <button type="button" class="timer-btn">
                  <img src="{{ asset('assets/images/timer.png') }}" alt="" /> 45 Minutes
                </button>
              </div>
              <div class="time-wrapper p-3 mt-3" data-day="Friday" data-time="4:00 WAT">
                <h6 class="time-text">Time</h6>
                <h6>4:00 WAT</h6>
                <button type="button" class="timer-btn">
                  <img src="{{ asset('assets/images/timer.png') }}" alt="" /> 45 Minutes
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-9 text-center mx-auto mt-4 test">
        <button class="proceed-btn" type="submit">Proceed</button>
      </div>
    </form>
  </div>
</section>

<script src="{{ asset('assets/scripts/schedule.js') }}"></script>


@endsection 