@extends('layouts.application')

@section('title')
    <x-title title="Student :: Dashboard" />
@endsection

@section('other_css')
    <link rel="stylesheet" href="{{ asset('assets/styles/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/styles/student-dashboard.css') }}" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('assets/styles/file-upload.css') }}">
@endsection

@section('content')
    <!-- <img style="height: 100px; width: 100px; border-radius: 50%; border: 1px solid red;" src="/Image1.png" alt=""> -->

    <section id="form-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 mb-5">
                    <div class="d-flex flex-column flex-md-row justify-content-between px-5 pt-5 hero-wrapper">
                        <h3>
                            <div>Hello {{ Str::ucfirst($student->name) }}</div>
                            <div>Embark on a Fun and Exciting</div>
                            <div>Language Learning Adventure Today!</div>
                        </h3>
                        <img class="img-fluid" src="{{ asset('assets/images/dashboard-hero-img.png') }}" alt="" />
                    </div>
                    @if ($studentSchedule && $courseLevel)
                        <h5 class="pt-3 text-color text-center text-lg-start">
                            Upcoming Class
                        </h5>
                        <div
                            class="p-4 d-flex flex-column flex-md-row justify-content-between align-items-md-start bg-white rounded">
                            <div class="d-flex flex-column flex-md-row">
                                <img class="upcoming-course-img" src="{{ asset('assets/images/dashboard-course-img.png') }}"
                                    alt="" />
                                <div class="ms-3">
                                    <p class="text-color">
                                        {{ $courseLevel->description
                                            ? Str::ucfirst(Str::replaceFirst('payment for', '', trim($courseLevel->description)))
                                            : 'N/A' }}
                                    </p>
                                    <button type="button" class="timer-btn">
                                        <img src="{{ asset('assets/images/timer.png') }}" alt="" /> 45 Minutes
                                    </button>
                                </div>
                            </div>
                            <div>
                                @php
                                    $classSchedule = $studentSchedule->classSchedule ?? null;
                                    $link = null;
                                    if ($classSchedule) {
                                        $link =
                                            $studentSchedule->session === 'morning'
                                                ? $classSchedule->morning_link
                                                : $classSchedule->afternoon_link;
                                    }
                                @endphp
                                @if ($link)
                                    <a class="join-btn" href="{{ $link }}">Join Class</a>
                                @else
                                    <span class="text-muted">Link not available</span>
                                @endif
                                <h6 class="mb-0 pt-2">Time</h6>
                                <p>
                                    {{ $studentSchedule->class_time
                                        ? $studentSchedule->class_time->setTimezone('UTC')->format('h:i A')
                                        : 'Time not available' }}
                                </p>
                            </div>
                        </div>
                    @else
                        <h5 class="pt-3 text-color text-center text-lg-start">
                            You have no Upcoming Class yet!!
                        </h5>
                    @endif

                </div>

                <div class="col-lg-3">
                    <div class="card p-4 border-0">
                        <div class="text-center border-bottom">
                            <h5 class="pt-2 text-color">Your Profile</h5>
                            @if ($student->profile_photo)
                                <img width="108" height="108" class="rounded-circle border border-5"
                                    src="{{ asset('storage/uploads/' . $student->profile_photo) }}" alt="user">
                            @else
                                <img src="{{ asset('assets/images/profile-img.png') }}" alt="student" />
                            @endif

                            <h5 class="pt-3 text-color">{{ Str::ucfirst($student->name) }}</h5>
                            @forelse ($student->studentCourseLevels as $courseLevel)
                                <p class="text-color">
                                    Learning {{ $courseLevel->level->course->name }} for Children
                                    ({{ $courseLevel->level->level_name }})
                                </p>
                            @empty
                                <p class="text-danger">Error: No Course Details!!</p>
                            @endforelse
                        </div>
                        <div class="d-flex justify-content-between pt-4">
                            <h6 class="personal">Personal Information</h6>
                            <a href="" class="text-muted edit-text" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop"">Edit</a>
                        </div>
                        <div class="">
                            <p><img src=" {{ asset('assets/images/gender.png') }}" alt="" />
                                {{ $student->gender }}
                            </p>
                        </div>
                        <div class="">
                            <p>
                                <img class="pb-2" src="{{ asset('assets/images/gender.png') }}" alt="" />
                                {{ Str::replaceFirst('-', ' ', $student->birthday) }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-9">
                    <div class="rounded px-5 py-4 my-5 my-md-2" style="background-color: #ffffff">
                        <h4 class="border-bottom">
                            <div>Resources & materials</div>
                        </h4>
                        <div class="row py-3">
                            @forelse ($courseResources as $resource)
                                <div class="col-12 col-md-6 col-lg-4 mb-4">
                                    <div class="card shadow-sm border-0 card-radius">
                                        @php
                                            $videoId = '';
                                            if (preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $resource->material, $matches)) {
                                                $videoId = $matches[1];
                                            }
                                        @endphp

                                        <iframe src="https://www.youtube.com/embed/{{ $videoId }}"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            referrerpolicy="strict-origin-when-cross-origin" height="180" allowfullscreen>
                                        </iframe>

                                        <div class="card-body">
                                            <div class="">
                                                <button
                                                    class="level-btn me-2">{{ $resource->courseLevel->level_name }}</button>
                                                <button type="button" class="level-btn">
                                                    5
                                                    Minutes
                                                </button>
                                            </div>
                                            <div class="pt-2 pb-1">
                                                {{ $resource->description }}
                                            </div>

                                            <a class="mt-2 start-text" href="">Start Watching</a>
                                        </div>
                                    </div>
                                </div>

                            @empty
                                <p>No course resources available yet!!</p>
                            @endforelse
                            {{-- <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <div class="card shadow-sm border-0 card-radius">
                                <img src="{{ asset('assets/images/dashboard-card-img.png') }}"
                                    class="card-img-top pt-3 px-3" alt="..." />
                                <div class="card-body">
                                    <div class="">
                                        <button class="level-btn me-2">Beginner</button>
                                        <button type="button" class="level-btn">
                                            <img src="{{ asset('assets/images/timer.png') }}" alt="" /> 45
                                            Minutes
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
                                <img src="{{ asset('assets/images/dashboard-card-img.png') }}"
                                    class="card-img-top pt-3 px-3" alt="..." />
                                <div class="card-body">
                                    <div class="">
                                        <button class="level-btn me-2">Beginner</button>
                                        <button type="button" class="level-btn">
                                            <img src="{{ asset('assets/images/timer.png') }}" alt="" /> 45
                                            Minutes
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
                                <img src="{{ asset('assets/images/dashboard-card-img.png') }}"
                                    class="card-img-top pt-3 px-3" alt="..." />
                                <div class="card-body">
                                    <div class="">
                                        <button class="level-btn me-2">Beginner</button>
                                        <button type="button" class="level-btn">
                                            <img src="{{ asset('assets/images/timer.png') }}" alt="" /> 45
                                            Minutes
                                        </button>
                                    </div>
                                    <div class="pt-2 pb-1">
                                        Learning Yorùbá for Children (Intro Class)
                                    </div>

                                    <a class="mt-2 start-text" href="">Start Watching</a>
                                </div>
                            </div>
                        </div> --}}
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 my-md-2 ">
                    <x-chat-us />

                </div>
            </div>
            @include('pages.students.includes.edit')
    </section>

    @section('other_scripts')
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
        <script src="{{ asset('assets/scripts/daypicker.js') }}"></script>
        <script src="{{ asset('assets/scripts/file-upload.js') }}"></script>
    @endsection
@endsection
