@extends('layouts.application')

@section('title')
<x-title title="Student :: Dashboard" />
@endsection

@section('other_css')
<link rel="stylesheet" href="{{ asset('assets/styles/demo.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/styles/student-dashboard.css') }}" />

@endsection

@section('content')
 <!-- <img style="height: 100px; width: 100px; border-radius: 50%; border: 1px solid red;" src="/Image1.png" alt=""> -->

 <section id="form-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 mb-5">
        <div
          class="d-flex flex-column flex-md-row justify-content-between px-5 pt-5 hero-wrapper"
        >
          <h3>
            <div>Hello Matilda,</div>
            <div>Embark on a Fun and Exciting</div>
            <div>Language Learning Adventure Today!</div>
          </h3>
          <img
            class="img-fluid"
            src="{{ asset('assets/images/dashboard-hero-img.png') }}"
            alt=""
          />
        </div>
        <h5 class="pt-3 text-color text-center text-lg-start">
          Upcoming Class
        </h5>
        <div
          class="p-4 p d-flex flex-column flex-md-row justify-content-between align-items-md-start bg-white rounded"
        >
          <div class="d-flex flex-column flex-md-row">
            <img
              class="upcoming-course-img"
              src="{{ asset('assets/images/dashboard-course-img.png') }}"
              alt=""
            />
            <div class="ms-3">
              <p class="text-color">
                Learning Yorùbá for Children (Intro Class)
              </p>
              <button type="button" class="timer-btn">
                <img src="{{ asset('assets/images/timer.png') }}" alt="" /> 45 Minutes
              </button>
            </div>
          </div>
          <div class="">
            <a class="join-btn" href="">Join Class</a>

            <h6 class="mb-0 pt-2">Time</h6>
            <p>12:00 WAT</p>
          </div>
        </div>
      </div>

      <div class="col-lg-3">
        <div class="card p-4 border-0">
          <div class="text-center border-bottom">
            <h5 class="pt-2 text-color">Your Profile</h5>

            <img src="{{ asset('assets/images/profile-img.png') }}" alt="" />
            <h5 class="pt-2 text-color">Adeniji Matilda</h5>
            <p class="text-muted">
              Learning Yorùbá for Children (Intro Class)
            </p>
          </div>
          <div class="d-flex justify-content-between pt-2">
            <h6 class="personal">Personal Information</h6>
            <p class="text-muted edit-text">Edit</p>
          </div>
          <div class="">
            <p><img src="{{ asset('assets/images/gender.png') }}" alt="" /> Female</p>
          </div>
          <div class="">
            <p>
              <img class="pb-2" src="{{ asset('assets/images/gender.png') }}x" alt="" /> December
              29
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-9">
        <div
          class="rounded px-5 py-4 my-5 my-md-2"
          style="background-color: #ffffff"
        >
          <h4 class="border-bottom">
            <div>Resources & materials</div>
          </h4>
          <div class="row py-3">
            <div class="col-12 col-md-6 col-lg-4 mb-4">
              <div class="card shadow-sm border-0 card-radius">
                <img
                  src="{{ asset('assets/images/dashboard-card-img.png') }}"
                  class="card-img-top pt-3 px-3"
                  alt="..."
                />
                <div class="card-body">
                  <div class="">
                    <button class="level-btn me-2">Beginner</button>
                    <button type="button" class="level-btn">
                      <img src="{{ asset('assets/images/timer.png') }}" alt="" /> 45 Minutes
                    </button>
                  </div>
                  <div class="pt-2 pb-1">
                    Learning Yorùbá for Children (Intro Class)
                  </div>

                  <a class="mt-2 start-text" href="">Start Watching</a>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-4">
              <div class="card shadow-sm border-0 card-radius">
                <img
                  src="{{ asset('assets/images/dashboard-card-img.png') }}"
                  class="card-img-top pt-3 px-3"
                  alt="..."
                />
                <div class="card-body">
                  <div class="">
                    <button class="level-btn me-2">Beginner</button>
                    <button type="button" class="level-btn">
                      <img src="{{ asset('assets/images/timer.png') }}" alt="" /> 45 Minutes
                    </button>
                  </div>
                  <div class="pt-2 pb-1">
                    Learning Yorùbá for Children (Intro Class)
                  </div>

                  <a class="mt-2 start-text" href="">Start Watching</a>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 mb-4">
              <div class="card shadow-sm border-0 card-radius">
                <img
                  src="{{ asset('assets/images/dashboard-card-img.png') }}"
                  class="card-img-top pt-3 px-3"
                  alt="..."
                />
                <div class="card-body">
                  <div class="">
                    <button class="level-btn me-2">Beginner</button>
                    <button type="button" class="level-btn">
                      <img src="{{ asset('assets/images/timer.png') }}" alt="" /> 45 Minutes
                    </button>
                  </div>
                  <div class="pt-2 pb-1">
                    Learning Yorùbá for Children (Intro Class)
                  </div>

                  <a class="mt-2 start-text" href="">Start Watching</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 my-md-2 ">
         <div class="px-4 rounded text-white w-100 d-flex flex-column align-items-center" style="background-color: #2F327D;">
          <p class="pt-3">- Support</p> 
          <h6 class="">Easy access to support if needed.</h6>
          <div class="flex justify-content-between">
            <button class="chat-btn">Chat us</button>
            <img src="{{ asset('assets/images/robot-img.png') }}" alt="">

          </div>
      
         </div>
    
    </div>
  </div>
</section>



@endsection