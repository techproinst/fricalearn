<form action="{{ route('payment.approve', ['payment' => $payment->id]) }}" method="POST">
  @csrf
  <!--edit demo course modal -->
  <div id="approve-form{{ $payment->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Approve Payment </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success   waves-effect waves-light">Approve</button>
        </div>

      </div>
    </div>
  </div>
</form>