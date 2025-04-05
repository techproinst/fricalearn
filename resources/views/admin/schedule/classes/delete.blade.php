<form action="{{ route('schedule.destroy', ['classSchedule' => $schedule->id]) }}" method="POST">
  @method('DELETE')
  @csrf
  <!--edit demo course modal -->
  <div id="delete-form{{ $schedule->id }}" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Delete class schedule for <span class="text-danger" >{{ $schedule->course->name }} course</span></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <p>Are you sure you want to delete the class schedule <span class="text-danger">{{
              $schedule->course->name }} course</span></p>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger waves-effect waves-light">Delete</button>
        </div>

      </div>
    </div>
  </div>
</form>