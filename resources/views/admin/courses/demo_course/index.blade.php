@extends('layouts.admin')

@section('content')




<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Course Menu</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">courses</a></li>
                    <li class="breadcrumb-item active">Free Course</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="card card-body">
            <h3 class="card-title">Upload Free Course Links</h3>
            <div>
                <button type="button" class="btn btn-outline-primary waves-effect waves-light" data-bs-toggle="modal"
                    data-bs-target="#myModal">Add Free Course</button>
            </div>
        </div>
    </div>

</div>

<div class="row">
    @forelse ($demoCourses as $demoCourse )
    <div class="col-12 col-md-6 col-lg-4 col-xl-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Free Course Name</h4>
                <h6 class="card-subtitle font-14 text-muted">{{ $demoCourse->courses->name }}</h6>
            </div>

            <iframe src="{{ $demoCourse->demo_course_link }}" title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            <div class="card-body">
                <p class="card-text">{{ $demoCourse->courses->description }}</p>
                @include('admin.courses.demo_course.edit')
                @include('admin.courses.demo_course.delete')
                <span class="badge bg-primary" data-bs-toggle="modal"
                    data-bs-target="#edit-form{{ $demoCourse->id }}">Edit</span>
                <span class="badge bg-danger" data-bs-toggle="modal"
                data-bs-target="#delete-form{{ $demoCourse->id }}">Delete</span>
            </div>
        </div>
    </div>
        
    @empty

    <p>No Free Course currently available</p>
        
    @endforelse
   
</div>

<!-- demo course modal -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Add Free Course</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="custom-validation" action="{{ route('demo_course.store') }}" method="POST">
                @csrf
                <div class="modal-body">

                    <div class=" mb-3">
                        <label for="courses">Courses</label>
                        <div class="mb-3">
                            <select class="form-select" aria-label="courses" name="course_id" required>
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
                        <label>URL</label>
                        <div>
                            <input parsley-type="url" type="url" class="form-control" required placeholder="URL"
                                name="demo_course_link" />
                            <span class="text-danger">
                                @error('demo_course_link')
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
