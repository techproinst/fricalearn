<form action="{{ route('schedule.update', ['classSchedule' => $schedule->id]) }}" method="POST">
    @method('PUT');
    @csrf
    <!--edit demo course modal -->
    <div id="edit-form{{ $schedule->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit schedule for <span class="text-success">{{ $schedule->course->name }}
                            Course</span> </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


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
                        <label for="timezone">Timezone</label>
                        <select class="form-select mb-3" aria-label="timezone" name="timezone_group_id" required>
                            <option value="">--select timezone</option>
                            @foreach ($timeZones as $timezone)
                                <option value="{{ $timezone->id }}"
                                    {{ old('timezone_group_id', $schedule->timezone_group_id) == $timezone->id ? 'selected' : '' }}>
                                    {{ $timezone->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('timezone_group_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="class_days">Class Days</label>
                        <div class="mb-3">
                            <select class="form-select" aria-label="class_days" name="day" required>
                                <option value="">--select Class Days</option>
                                @foreach ($days as $day)
                                    <option value="{{ $day }}"
                                        {{ old('day', $schedule->day) == $day ? 'selected' : '' }}>{{ $day }}
                                    </option>
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
                            <input type="time" class="form-control" required placeholder="" name="morning_time"
                                value="{{ $schedule->morning }}" />
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
                            <input type="time" class="form-control" required placeholder="" name="afternoon_time"
                                value="{{ $schedule->afternoon }}" />
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
                     <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                </div>

            </div>
        </div>
        
    </div>
    
</form>
