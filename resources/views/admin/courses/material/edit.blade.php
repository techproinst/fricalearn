<form action="{{ route('course_material.update', ['courseMaterial' => $resource->id]) }}" method="POST">
  @method('PUT')
  @csrf
  <!--edit demo course modal -->
  <div id="edit-form{{ $resource->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Edit Course Resource</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">

          <div class="mb-3">
            <label for="courses">Courses</label>
            <div class="mb-3">
                <select  class="form-select course-select" aria-label="courses" name="course_id" required>
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
            <select  class="form-select level-select" aria-label="level" name="course_level_id" required>
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
                    name="title" value="{{ $resource->title}}" />
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
                    name="description" value="{{ $resource->description}}" />
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
                    name="material" value="{{ $resource->material }}" />
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
          <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
        </div>

      </div>
    </div>
  </div>
</form>