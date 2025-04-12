<form action="{{ route('payment.approve', ['payment' => $payment->id]) }}" method="POST">
  @csrf
  <!--edit demo course modal -->
  <div id="approve-form{{ $payment->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Approve Payment </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label>Amount Paid</label>
            <div>
              <input parsley-type="amount" type="number" class="form-control" required placeholder="000000"
                name="amount" value="{{ old('amount')}}" />
              <input name="amount_due" value="{{ $payment->amount_due}}" hidden/>
              <input name="student_id" value="{{ $payment->student_id}}" hidden/>
              <span class="text-danger">
                @error('amount')
                {{ $message }}
                @enderror
              </span>
            </div>
          </div>

          <div class="mb-3">
            <label>Payment Reference</label>
            <div>
              <input parsley-type="payment_reference" type="text" class="form-control" required
                placeholder="TRX-123-456-789" name="payment_reference" value="{{ old('payment_reference')}}" />
              <span class="text-danger">
                @error('payment_reference')
                {{ $message }}
                @enderror
              </span>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success   waves-effect waves-light">Approve</button>
        </div>

      </div>
    </div>
  </div>
</form>