@extends('layouts.admin')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Course Resources Menu</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">courses</a></li>
                        <li class="breadcrumb-item active">Course Resources</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="card card-body">
                <h3 class="card-title">Upload Course Resources</h3>
                <div>
                    <button type="button" class="btn btn-outline-primary waves-effect waves-light" data-bs-toggle="modal"
                        data-bs-target="#myModal">Add Course Material </button>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3">Resources</h4>

                    <table id="state-saving-datatable" class="table activate-select dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Course</th>
                                <th>Level</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Material link</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($courseResources as $resource)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $resource->course->name }}</td>
                                    <td>{{ $resource->courseLevel->level_name }}</td>
                                    <td>{{ $resource->title }}</td>
                                    <td>{{ $resource->description }}</td>
                                    @php
                                        $videoId = '';
                                        if (preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $resource->material, $matches)) {
                                            $videoId = $matches[1];
                                        }
                                    @endphp
                                    <td>
                                        <iframe src="https://www.youtube.com/embed/{{ $videoId }}"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            referrerpolicy="strict-origin-when-cross-origin" height="100" allowfullscreen>
                                        </iframe>
                                    </td>
                                    <td>
                                        @include('admin.courses.material.edit')
                                        @include('admin.courses.material.delete')
                                        <span class="badge bg-primary" data-bs-toggle="modal"
                                            data-bs-target="#edit-form{{ $resource->id }}"> <i class=" fas fa-edit"></i>
                                            Edit</span>
                                        <span class="badge bg-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete-form{{ $resource->id }}"> <i class=" fas fa-trash"></i>
                                            Delete</span>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-danger">No course resources available yet!!</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <!-- demo course modal -->
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Add Course Material</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="custom-validation" action="{{ route('course_material.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="courses">Courses</label>
                            <div class="mb-3">
                                <select class="form-select course-select" aria-label="courses" name="course_id" required>
                                    <option value="">--select course</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}"
                                            {{ old('course_id') == $course->id ? 'selected' : '' }}>{{ $course->name }}
                                        </option>
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
                            <select class="form-select level-select" aria-label="level" name="course_level_id" required>
                                <option value="">--Select Course Level</option>
                            </select>
                            <span class="text-danger">
                                @error('course_level_id')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="mb-3">
                            <label>Title</label>
                            <div>
                                <input type="text" class="form-control" required placeholder="Material title"
                                    name="title" value="{{ old('title') }}" />
                                <span class="text-danger">
                                    @error('title')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>Description</label>
                            <div>
                                <input type="text" class="form-control" required placeholder="Description"
                                    name="description" value="{{ old('description') }}" />
                                <span class="text-danger">
                                    @error('description')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label>URL</label>
                            <div>
                                <input parsley-type="url" type="url" class="form-control" required placeholder="URL"
                                    name="material" value="{{ old('material') }}" />
                                <span class="text-danger">
                                    @error('material')
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
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('assets/scripts/course-level.js') }}"></script>
    @section('data_table_script')
        <script src="{{ asset('assets/scripts/admin/datatable.js') }}"></script>
        <script src="{{ asset('assets/scripts/admin/modal.js') }}"></script>
    @endsection
@endsection
