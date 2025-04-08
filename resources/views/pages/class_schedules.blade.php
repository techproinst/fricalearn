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
    <div class="row">
      <div class="col-lg-6 mx-auto">
        @if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>

            @endforeach
          </ul>
        </div>

        @endif
      </div>
    </div>

    <form action="{{ route('student.store_schedule') }}" method="POST">
      @csrf
      <input type="hidden" name="student_id" value="{{ $student->id }}" />
      <input type="hidden" name="class_schedule_id" value="{{ $schedule->id }}" />
      <input type="hidden" name="course_id" value="{{ $schedule->course_id }}" />

      @forelse ($classSchedules->pluck('day')->unique() as $day)
      <input type="hidden" name="schedule[{{ strtolower($day) }}][time]" id="{{ strtolower($day) }}_time" />
      @empty
      @endforelse

      <div class="row g-4 justify-content-center">
        @forelse ($classSchedules as $schedule)
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
          <div class="card border-none" data-day="{{ $schedule->day }}">
            <div class="card-body p-5">
              <h5 class="card-title custom-title">{{ $schedule->day }}</h5>
              <h6 class="py-3 avail-text">Available Time</h6>
              <div class="time-wrapper p-3" data-day="{{ $schedule->day }}" data-time="{{ $schedule->morning }}">
                <h6 class="time-text">Time</h6>
                <h6>{{ $schedule->morning }}</h6>
                <button type="button" class="timer-btn">
                  <img src="{{ asset('assets/images/timer.png') }}" alt="" /> 45 Minutes
                </button>
              </div>
              <div class="time-wrapper p-3 mt-3" data-day="{{ $schedule->day }}" data-time="{{ $schedule->afternoon }}">
                <h6 class="time-text">Time</h6>
                <h6>{{ $schedule->afternoon }}</h6>
                <button type="button" class="timer-btn">
                  <img src="{{ asset('assets/images/timer.png') }}" alt="" /> 45 Minutes
                </button>
              </div>
            </div>
          </div>
        </div>
        @empty
        @endforelse
      </div>

      <div class="col-lg-9 text-center mx-auto mt-4 test">
        <button class="proceed-btn" type="submit">Proceed</button>
      </div>
    </form>

  </div>
</section>

<script src="{{ asset('assets/scripts/schedule.js') }}"></script>


@endsection