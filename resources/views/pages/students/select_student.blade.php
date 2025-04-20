@extends('layouts.application')

@section('title')
<x-title title="Student :: Login" />
@endsection

@section('other_css')
<link rel="stylesheet" href="{{ asset('assets/styles/demo.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/styles/select-kid.css') }}" />

@endsection

@section('content')
<section id="form-section">
  <div class="container">
    <div class="row my-5">
      <div class="col-lg-9 mx-auto bg-white p-5 rounded">
        <div class="text-center">
          <h1>
            <div>Who’s Learning?</div>
          </h1>
          <p class="text-muted">Login to start learning🚀</p>
        </div>

        <div class="student-container">
          @forelse ($students as $student )
          <div class="student-card avatar-wrapper">
            <a href="{{ route('student.dashboard',['student' => $student->id]) }}"><img class="student-img" src="{{ asset('assets/images/student-learnin-2.png') }}"
                alt="Student" /></a>

            <p class="card-title mt-2 avatar-text">{{ $student->name }}</p>
          </div>          
          @empty
          <p>No active enrolled student!!</p>
            
          @endforelse 
          


          <div class="student-card border d-flex justify-content-center align-items-center add-wrapper">
            <div class="">
              <a href="{{ route('student.create') }}">
                <i class="bi bi-plus-circle-fill add-icon"></i>

                <p class="card-title add">Add New Kid</p>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>




@endsection