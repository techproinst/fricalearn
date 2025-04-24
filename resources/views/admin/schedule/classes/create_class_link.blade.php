<form action="{{ route('class_schedules.link', ['classSchedule' => $schedule->id]) }}" method="POST">
    @csrf
    <!--edit demo course modal -->
    <div id="class-link-form{{ $schedule->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="editScheduleLabel{{ $schedule->id }}">Schedule  class for <span
                            class="text-success">{{ $schedule->courseLevel->level_name }} level of {{ $schedule->course->name }} course </span> </h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Morning class link</label>
                        <div>
                            <input parsley-type="url" type="url" class="form-control" required placeholder="https://frika-learn"
                                name="morning_link" value="{{ old('morning_link') }}" required/>
                            <span class="text-danger">
                                @error('morning_link')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Afternoon class link</label>
                        <div>
                            <input parsley-type="url" type="url" class="form-control" required placeholder="https://frika-learn"
                                name="afternoon_link" value="{{ old('afternoon_link') }}" required />
                            <span class="text-danger">
                                @error('afternoon_link')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Schedule</button>
                </div>

            </div>
        </div>
    </div>
</form>
