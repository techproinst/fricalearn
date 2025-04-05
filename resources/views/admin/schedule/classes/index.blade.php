@extends('layouts.admin')

@section('content')


<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Class Schedules</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active">Class Schedules</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="card card-body">
            <h3 class="card-title">Create Class Schedules</h3>
            <div>
                <button type="button" class="btn btn-outline-primary waves-effect waves-light" data-bs-toggle="modal"
                    data-bs-target="#myModal">Create</button>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-3">Class Schedules</h4>
               

                <table id="state-saving-datatable" class="table activate-select dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Course</th>
                            <th>Continent</th>
                            <th>Day</th>
                            <th>Morning Schedule</th>
                            <th>Afternoon Schedule</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($classSchedules as  $schedule)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $schedule->course->name }}</td>
                            <td>{{ $schedule->continent }}</td>
                            <td>{{ $schedule->day }}</td>
                            <td>{{date('h:i:A', strtotime($schedule->morning))  }}</td>
                            <td>{{date('h:i:A',strtotime($schedule->afternoon))  }}</td>
                            <td>
                                @include('admin.schedule.classes.edit')
                                @include('admin.schedule.classes.delete')
                                <span class="badge bg-primary" data-bs-toggle="modal"
                                data-bs-target="#edit-form{{ $schedule->id }}"> <i class=" fas fa-edit"></i> Edit</span>
                                <span class="badge bg-danger" data-bs-toggle="modal"
                                data-bs-target="#delete-form{{ $schedule->id }}"> <i class=" fas fa-trash"></i> Delete</span> 
                                
                            </td>
                        </tr>    
                        @empty
                        <p class="text-danger">No Class Schedules Available yet!!</p>
                            
                        @endforelse
                        
                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div>
</div>
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Create Class Schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="custom-validation" action="{{ route('class_schedule.store') }}" method="POST">
                @csrf
                <div class="modal-body">

                    <div class=" mb-3">
                        <label for="course_id">Courses</label>
                        <div class="mb-3">
                            <select class="form-select" aria-label="course_id" name="course_id" required>
                                <option value="">--select course</option>
                                @foreach ($courses as $course )
                                <option value="{{ $course->id }}" {{ old('course_id')==$course->id ? 'selected' : ''
                                    }}>{{ $course->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">
                                @error('course_id')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="continents">Continents</label>
                        <div class="mb-3">
                            <select class="form-select" aria-label="continents" name="continent" required>
                                <option value="">--select Continents</option>
                                @foreach ($continents as $continent )
                                <option value="{{ $continent}}" {{ old('continent')==$continent ? 'selected' : '' }}>{{
                                    $continent}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">
                                @error('continent')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="class_days">Class Days</label>
                        <div class="mb-3">
                            <select class="form-select" aria-label="class_days" name="day" required>
                                <option value="">--select Class Days</option>
                                @foreach ($days as $day )
                                <option value="{{ $day}}" {{ old('day')==$day ? 'selected' : '' }}>{{ $day}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">
                                @error('day')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="morning_class">Morning Class</label>
                        <div>
                            <input type="time" class="form-control" required placeholder="" name="morning"
                                value="{{ old('morning') }}" />
                            <span class="text-danger">
                                @error('morning')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Afternoon Class</label>
                        <div>
                            <input type="time" class="form-control" required placeholder="" name="afternoon"
                                value="{{ old('afternoon') }}" />
                            <span class="text-danger">
                                @error('afternoon')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('data_table_script')
<script>
    $('#state-saving-datatable').DataTable({
   stateSave: true
})
</script>
@endsection