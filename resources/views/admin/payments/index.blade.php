@extends('layouts.admin')

@section('content')


<div class="row">
  <div class="col-lg-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0">Payments Menu</h4>

      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
          <li class="breadcrumb-item active">Payments</li>
        </ol>
      </div>

    </div>
  </div>
</div>
<!-- end page title -->


<div class="row">

  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">

        <h4 class="card-title mb-4">Payment Menu Tabs</h4>
    
        <div class="row">
          <div class="col-md-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link mb-2 active" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home"
                role="tab" aria-controls="v-pills-home" aria-selected="true">Pending Payments</a>
              <a class="nav-link mb-2" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile" role="tab"
                aria-controls="v-pills-profile" aria-selected="false">Approved Payments</a>
              <a class="nav-link mb-2" id="v-pills-messages-tab" data-bs-toggle="pill" href="#v-pills-messages"
                role="tab" aria-controls="v-pills-messages" aria-selected="false">Declined Payments</a>
            
            </div>
          </div>
          <div class="col-md-9">
            <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                aria-labelledby="v-pills-home-tab">

                <table id="state-saving-datatable" class="table activate-select dt-responsive nowrap w-100">
                  <thead>
                      <tr>
                          <th>S/N</th>
                          <th>Parent Name</th>
                          <th>Amount Due</th>
                          <th>Status</th>
                          <th>Currency</th>
                          <th>Payment Receipt</th>
                          <th>Student Info</th>
                          <th>Action</th>
                      </tr>
                  </thead>

                  <tbody>
                       @forelse ($pendingPayments as  $payment)
                      <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $payment->parent->name }}</td>
                          @php
                              $currencySymbol = $payment->currency == 'ngn' ? '&#8358;' : '$';
                          @endphp
                          <td>{!!$currencySymbol!!}{{ $payment->amount_due }}</td>
                          <td>{{ $payment->status}}</td>
                          <td>{{$payment->currency}}</td>
                          <td><img class="rounded me-2"  alt="payment-receipt" width="200" src="{{ asset('storage/uploads/'.$payment->payment_receipt) }}" data-holder-rendered="true"></td>
                          <td><a href="{{ route('student.show', ['student' => $payment->student->id]) }}">view Student Details</a></td>
                          <td>
                              @include('admin.payments.approve')
                              @include('admin.payments.decline')
                              <span class="badge bg-primary" data-bs-toggle="modal"
                              data-bs-target="#approve-form{{ $payment->id }}"> <i class=" fas fa-edit"></i>Approve</span>  
                              <span class="badge bg-danger" data-bs-toggle="modal"
                              data-bs-target="#decline-form{{ $payment->id }}"> <i class=" fas fa-trash"></i>Decline</span> 
                          </td>
                      </tr>    
                      @empty
                      <p class="text-danger">No Pending Payments Available yet!!</p>
                          
                      @endforelse 
                      
                  </tbody>
                </table>
               
              </div>
              <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <table id="state-saving-datatable" class="table activate-select dt-responsive nowrap w-100">
                  <thead>
                      <tr>
                          <th>S/N</th>
                          <th>Parent Name</th>
                          <th>Amount Due</th>
                          <th>Status</th>
                          <th>Transaction Reference</th>
                          <th>Currency</th>
                          <th>Payment Receipt</th>
                          <th>Student Info</th>       
                      </tr>
                  </thead>

                  <tbody>
                       @forelse ($approvedPayments as  $payment)
                      <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $payment->parent->name }}</td>
                          @php
                              $currencySymbol = $payment->currency == 'ngn' ? '&#8358;' : '$';
                          @endphp
                          <td>{!!$currencySymbol!!}{{$payment->amount_due}}</td>
                          <td class="text-success">{{ $payment->status}}</td>
                          <td>{{ $payment->transaction_reference }}</td>
                          <td>{{ $payment->currency}}</td>
                          <td><a href="{{ asset('storage/uploads/'.$payment->payment_receipt) }}"  target="_blank" ><img class="rounded me-2" alt="payment-receipt" width="200" src="{{ asset('storage/uploads/'.$payment->payment_receipt) }}" data-holder-rendered="true"></a></td>
                          <td><a href="{{ route('student.show', ['student' => $payment->student->id]) }}">view Student Details</a></td>
                      </tr>    
                      @empty
                      <p class="text-danger">No Approved Payments Available yet!!</p>
                          
                      @endforelse 
                      
                  </tbody>
                </table>
              </div>
              <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                <table id="state-saving-datatable" class="table activate-select dt-responsive nowrap w-100">
                  <thead>
                      <tr>
                          <th>S/N</th>
                          <th>Parent Name</th>
                          <th>Amount Paid</th>
                          <th>Status</th>
                          <th>Transaction Reference</th>
                          <th>Currency</th>
                          <th>Payment Receipt</th>
                          <th>Student Info</th>       
                      </tr>
                  </thead>

                  <tbody>
                       @forelse ($declinedPayments as  $payment)
                      <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $payment->parent->name }}</td>
                          @php
                              $currencySymbol = $payment->currency == 'ngn' ? '&#8358;' : '$';
                          @endphp
                          <td>{!!$currencySymbol!!}{{$payment->amount_due}}</td>
                          <td class="text-danger">{{ $payment->status}}</td>
                          <td>{{ $payment->transaction_reference }}</td>
                          <td>{{ $payment->currency}}</td>
                          <td><a href="{{ asset('storage/uploads/'.$payment->payment_receipt) }}"  target="_blank" ><img class="rounded me-2" alt="payment-receipt" width="200" src="{{ asset('storage/uploads/'.$payment->payment_receipt) }}" data-holder-rendered="true"></a></td>
                          <td><a href="{{ route('student.show', ['student' => $payment->student->id]) }}">view Student Details</a></td>
                      </tr>    
                      @empty
                      <p class="text-danger">No Approved Payments Available yet!!</p>
                          
                      @endforelse 
                      
                  </tbody>
                </table>
               
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end card -->
  </div>



</div>



@endsection
@section('data_table_script')
<script>
  $('#state-saving-datatable').DataTable({
   stateSave: true
})
</script>
@endsection