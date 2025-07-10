@extends('layouts.application')

@section('title')
    <x-title title="Parent :: Dashboard" />
@endsection

@section('other_css')
    <link rel="stylesheet" href="{{ asset('assets/styles/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/styles/student-dashboard.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/styles/dashboard-card-hover.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/styles/file-upload.css') }}">
@endsection

@section('content')
    <!-- <img style="height: 100px; width: 100px; border-radius: 50%; border: 1px solid red;" src="/Image1.png" alt=""> -->

    <section id="form-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="rounded px-5 py-3 my-3 my-md-2 " style="background-color: #ffffff">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4>
                                <div>Registered Kids</div>
                            </h4>
                            <a href="{{ route('courses.index') }}"> <img src="{{ asset('assets/images/btn.png') }}"
                                    alt="" /></a>
                        </div>

                        <hr />
                        <div class="row">

                            @forelse ($students as $student)
                            
                                <div class="col-12 col-md-6 col-lg-4 mb-4">
                                    <a class="student-link" href="{{ route('student.dashboard',['student' => $student->id]) }}">
                                    <div class="card shadow-sm border-0 card-radius">
                                        <img src="{{ asset('assets/images/Frame 1618868856 (2).png') }}"
                                            class="card-img-top pt-3 px-3" alt="..." />
                                        <div class="card-body text-center">
                                            <h6>{{ Str::ucfirst($student->name) }}</h6>
                                            @forelse ($student->paidCourseLevels as $paidCourse)
                                                <p>{{ $paidCourse->course->description }}</p>
                                            @empty
                                                <p>No paid courses found.</p>
                                            @endforelse
                                        </div>
                                    </div>
                                </a>
                                </div>
                        

                            @empty
                                <p class="text-danger">You have no registered student yet!!.</p>
                                <h6 class="text-success">Registration Procedures</h6>
                                <p>Welcome to your FricaLearn Dashboard — track your progress, explore new courses, and enroll your kids in any available 
class to keep the learning going!</p>
                            @endforelse



                        </div>
                    </div>
                </div>

                <div class="col-lg-3 mt-2"> 
                <x-parent-profile :parentInfo="$parentInfo"/>
                   
                </div>
            </div>


            <div class="row">
                <div class="col-lg-9">
                    @if ($students->isNotEmpty())
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="pt-3 text-color text-center text-lg-start">
                                Billing Menu
                            </h5>

                        </div>
                        <div class="p-4 bg-white rounded">
                            <div class="border-bottom  mb-3 ">
                                <div class="d-flex align-items-center mb-3">
                                    <a href="{{ route('parent.payments') }}"> <img
                                            src="{{ asset('assets/images/btn.png') }}" alt="" /></a>
                                    <h6 class="mb-0 ms-2">Payments</h6>
                                </div>
                            </div>
                            <div class="border-bottom  mb-3 ">
                                <div class="d-flex align-items-center mb-3">
                                    <a href="{{ route('parent.subscriptions') }}"> <img
                                            src="{{ asset('assets/images/btn.png') }}" alt="" /></a>
                                    <h6 class="mb-0 ms-2">Subscriptions</h6>
                                </div>
                            </div>


                        </div>
                    @endif


                </div>

                <div class="col-lg-3 my-4 my-md-4">
                    <x-chat-us :parentInfo="$parentInfo"/>
                   
                </div>
            </div>


        </div>


        @include('pages.parents.includes.edit')
        <script src="{{ asset('assets/scripts/file-upload.js') }}"></script>
    </section>




@endsection
