@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Course Menu</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Course Menu</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">Available Courses</h4>


                    <table id="state-saving-datatable" class="table activate-select dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Course Name</th>
                                <th>Course Level Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($courses as $index => $course)
                                @forelse ($course->courseLevels as $level)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $course->name }}</td>
                                        <td>{{ $level->level_name }}</td>
                                        <td>{{ Str::replaceFirst('payment for', ' ', $level->description) }}</td>
                                        @php
                                            $prices = json_decode($level->price, true);
                                        @endphp
                                        <td>
                                            @foreach ($prices as $key => $price)
                                                @php
                                                    $currencySymbol =
                                                        $key === App\Enums\Continent::OTHER->value
                                                            ? App\Enums\Currency::DOLLAR->value
                                                            : App\Enums\Currency::NAIRA->value;
                                                @endphp
                                                <span>
                                                    {{ ucfirst($key) }}: {!! $currencySymbol !!}{{ number_format($price) }}
                                                </span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @include('admin.courses.edit')
                                            {{--  @include('admin.schedule.classes.delete') --}}
                                            <div class="d-flex gap-2">
                                                <span class="badge bg-primary" data-bs-toggle="modal"
                                                    data-bs-target="#edit-form{{ $level->id }}"> <i
                                                        class=" fas fa-edit"></i>
                                                    Edit</span>
                                                {{-- <span class="badge bg-danger" data-bs-toggle="modal"
                                                    data-bs-target="#delete-form{{ $level->id }}">
                                                    <i class=" fas fa-trash"></i>
                                                    Delete</span> --}}
                                            </div>
                                        </td>


                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="8">No Course Level Available</td>
                                    </tr>
                                @endforelse

                            @empty
                                <tr>
                                    <td colspan="8">No courses Available Yet!!</td>
                                </tr>
                            @endforelse


                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection
@section('data_table_script')
    <script src="{{ asset('assets/scripts/admin/datatable.js') }}"></script>
    <script src="{{ asset('assets/scripts/admin/modal.js') }}"></script>
@endsection
