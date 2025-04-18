<form action="{{ route('payment.decline', ['payment' => $payment->id]) }}" method="POST">
  @csrf
  <!--edit demo course modal -->
  <div id="decline-form{{ $payment->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Decline Payment</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to decline the payment made by  <span class="text-danger">{{ $payment->parent->name }}</span></p>
          <div class="mb-3">
            <label>Reason</label>
            <div>
                <input type="text" class="form-control" required placeholder="Reason for declining the payment" name="decline_reason" required />
                <input type="text" name="payment_id" id="" value="{{ $payment->id }}" hidden>
                <span class="text-danger">
                    @error('decline_reason')
                    {{ $message }}
                    @enderror
                </span>
            </div>
        </div>
         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger waves-effect waves-light">Decline</button>
        </div>

      </div>
    </div>
  </div>
</form>