@extends('layouts.application')

@section('title')
    <x-title title="Enrollments :: Dashboard" />
@endsection

@section('other_css')
    <link rel="stylesheet" href="{{ asset('assets/styles/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/styles/student-dashboard.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/styles/file-upload.css') }}">
@endsection

@section('content')
    <!-- <img style="height: 100px; width: 100px; border-radius: 50%; border: 1px solid red;" src="/Image1.png" alt=""> -->

    <section id="form-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="rounded px-5 py-3 my-3 my-md-2 " style="background-color: #ffffff">
                        <div class="">
                            <h4>
                                <div>Enrollments</div>
                            </h4>

                        </div>
                        <hr />
                        <div class="row py-3">
                            <div class="table-responsive">

                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">S/N</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Gender</th>
                                            <th scope="col">Course Name</th>
                                            <th scope="col">Course Level</th>
                                            <th scope="col">Enrollment Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($studentEnrollments as $student)
                                            @forelse($student->studentCourseLevels as $courseLevel)
                                                <tr>
                                                    <td scope="row">{{ $loop->parent->iteration }}</td>
                                                    <td>{{ $student->name }}</td>
                                                    <td>{{ $student->gender }}</td>
                                                    <td>{{ $courseLevel->course->name }}</td>
                                                    <td>{{ $courseLevel->level->level_name }}</td>
                                                    <td>{{ $courseLevel->paid ? 'Paid' : 'Incomplete' }}</td>
                                                    <td>
                                                        <a href="{{ route('payment', ['student' => $student->id]) }}">
                                                            Proceed to Payment
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7">No course levels found for {{ $student->name }}</td>
                                                </tr>
                                            @endforelse
                                        @empty
                                            <tr>
                                                <td class="text-success" colspan="7">You have no outstanding enrollment
                                                    yet!!
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                {!! $studentEnrollments->withQueryString()->links('pagination::bootstrap-5') !!}

                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-3 mt-2">
                    <x-parent-profile :parentInfo="$parentInfo" />
                </div>
            </div>


            <div class="row">
                <div class="col-lg-9">
                    {{-- <div class="d-flex justify-content-between align-items-center">
                        <h5 class="pt-3 text-color text-center text-lg-start">
                            Billing History
                        </h5>

                    </div>


                    <div class="p-4 bg-white rounded">
                        <div class="border-bottom d-flex justify-content-between mb-3 ">
                            <div>
                                <p class="mb-2">Learning Yorùbá for Children (Intro Class) </p>
                                <h6>₦ 30,000</h6>
                            </div>
                            <div>
                                <p class="mb-2">Adeniji Matilda</p>
                                <h6>25/01/2025</h6>
                            </div>

                        </div>
                        <div class="border-bottom d-flex justify-content-between mb-3">
                            <div>
                                <p class="mb-2">Learning Yorùbá for Children (Intro Class) </p>
                                <h6>₦ 30,000</h6>
                            </div>
                            <div>
                                <p class="mb-2">Adeniji Matilda</p>
                                <h6>25/01/2025</h6>
                            </div>

                        </div>
                        <div class="border-bottom d-flex justify-content-between">
                            <div>
                                <p class="mb-2">Learning Yorùbá for Children (Intro Class) </p>
                                <h6>₦ 30,000</h6>
                            </div>
                            <div>
                                <p class="mb-2">Adeniji Matilda</p>
                                <h6>25/01/2025</h6>
                            </div>

                        </div>

                    </div> --}}
                </div>

                <div class="col-lg-3 my-4 my-md-2">
                    <x-chat-us :parentInfo="$parentInfo" />
                </div>
            </div>


        </div>
    </section>


    @include('pages.parents.includes.edit')
    <script src="{{ asset('assets/scripts/file-upload.js') }}"></script>
@endsection
