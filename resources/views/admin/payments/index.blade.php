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
                aria-controls="v-pills-profile" aria-selected="false">Profile</a>
              <a class="nav-link mb-2" id="v-pills-messages-tab" data-bs-toggle="pill" href="#v-pills-messages"
                role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
              <a class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" href="#v-pills-settings" role="tab"
                aria-controls="v-pills-settings" aria-selected="false">Settings</a>
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
                          <th>Name</th>
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
                          <td>{{ $payment->amount_due }}</td>
                          <td>{{ $payment->status}}</td>
                          <td>{{ $payment->currency}}</td>
                          <td><img class="rounded me-2" alt="payment-receipt" width="200" src="{{ asset('storage/uploads/'.$payment->payment_receipt) }}" data-holder-rendered="true"></td>
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
                <p>
                  Food truck fixie locavore, accusamus mcsweeney's marfa nulla
                  single-origin coffee squid. Exercitation +1 labore velit, blog
                  sartorial PBR leggings next level wes anderson artisan four loko
                  farm-to-table craft beer twee. Qui photo booth letterpress,
                  commodo enim craft beer mlkshk.
                </p>
                <p class="mb-0"> Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco
                  ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna 8-bit</p>
              </div>
              <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                <p>
                  Etsy mixtape wayfarers, ethical wes anderson tofu before they
                  sold out mcsweeney's organic lomo retro fanny pack lo-fi
                  farm-to-table readymade. Messenger bag gentrify pitchfork
                  tattooed craft beer, iphone skateboard locavore carles etsy
                  salvia banksy hoodie helvetica. DIY synth PBR banksy irony.
                  Leggings gentrify squid 8-bit cred.
                </p>
                <p class="mb-0">DIY synth PBR banksy irony.
                  Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh
                  mi whatever gluten-free.</p>
              </div>
              <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                <p>
                  Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
                  art party before they sold out master cleanse gluten-free squid
                  scenester freegan cosby sweater. Fanny pack portland seitan DIY,
                  art party locavore wolf cliche high life echo park Austin. Cred
                  vinyl keffiyeh DIY salvia PBR, banh mi before they sold out
                  farm-to-table.
                </p>
                <p class="mb-0">Fanny pack portland seitan DIY,
                  art party locavore wolf cliche high life echo park Austin. Cred
                  vinyl keffiyeh DIY salvia PBR, banh mi before they sold out
                  farm-to-table.
                </p>
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