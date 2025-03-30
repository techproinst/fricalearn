<form action="{{ route('demo_course.update', ['demoCourse' => $demoCourse->id]) }}" method="POST">
  @csrf
  <!--edit demo course modal -->
  <div id="edit-form{{ $demoCourse->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Edit Demo Course</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

       
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
                name="demo_course_link" value="{{ $demoCourse->demo_course_link }}" />
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
          <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
        </div>

      </div>
    </div>
  </div>
</form>