@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Subscriptions Menu</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Subscriptions</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title mb-4">Subscription Menu Tabs</h4>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <a class="nav-link mb-2 active" id="v-pills-home-tab" data-bs-toggle="pill"
                                    href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                                    aria-selected="true">Active Subscription</a>
                                <a class="nav-link mb-2" id="v-pills-profile-tab" data-bs-toggle="pill"
                                    href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                    aria-selected="false">Expired Subscription</a>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                    aria-labelledby="v-pills-home-tab">

                                    <table id="state-active-datatable"
                                        class="table activate-select dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Parent Name</th>
                                                <th>Student Name</th>
                                                <th>Course</th>
                                                <th>Course Level</th>
                                                <th>Starting Date</th>
                                                <th>Ending Date</th>
                                                <th>Student Info</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($activeSubscriptions as $activeSubscription)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $activeSubscription->parent->name }}</td>
                                                    <td>{{ $activeSubscription->student->name }}</td>
                                                    <td>{{ $activeSubscription->courseLevel->course->name }}</td>
                                                    <td>{{ $activeSubscription->courseLevel->level_name }}</td>
                                                    <td>{{ $activeSubscription->start_date->setTimezone('UTC')->format('M-d-Y H:i:A') }}
                                                    </td>
                                                    <td>{{ $activeSubscription->end_date->setTimezone('UTC')->format('M-d-Y H:i:A') }}
                                                    </td>
                                                    <td><a
                                                            href="{{ route('student.show', ['student' => $activeSubscription->student->id]) }}">view
                                                            Student Details</a></td>
                                                    <td class="text-success">
                                                        {{ $activeSubscription->is_active ? 'Active' : 'Inactive' }}</td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>

                                </div>
                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                    aria-labelledby="v-pills-profile-tab">
                                    <table id="state-expired-datatable"
                                        class="table activate-select dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Parent Name</th>
                                                <th>Student Name</th>
                                                <th>Course</th>
                                                <th>Course Level</th>
                                                <th>Started On </th>
                                                <th>Expired On</th>
                                                <th>Student Info</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($inActiveSubscriptions as $inActiveSubscription)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $inActiveSubscription->parent->name }}</td>
                                                    <td>{{ $inActiveSubscription->student->name }}</td>
                                                    <td>{{ $inActiveSubscription->courseLevel->course->name }}</td>
                                                    <td>{{ $inActiveSubscription->courseLevel->level_name }}</td>
                                                    <td>{{ $inActiveSubscription->start_date->setTimezone('UTC')->format('M-d-Y H:i:A') }}
                                                    </td>
                                                    <td>{{ $inActiveSubscription->end_date->setTimezone('UTC')->format('M-d-Y H:i:A') }}
                                                    </td>
                                                    <td><a
                                                            href="{{ route('student.show', ['student' => $inActiveSubscription->student->id]) }}">view
                                                            Student Details</a></td>
                                                    <td class="text-danger">
                                                        {{ $inActiveSubscription->is_active ? 'Active' : 'Expired' }}</td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>



    </div>
@endsection
@section('data_table_script')
    <script src="{{ asset('assets/scripts/admin/subscription.js') }}"></script>
@endsection
