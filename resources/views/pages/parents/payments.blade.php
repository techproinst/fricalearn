@extends('layouts.application')

@section('title')
    <x-title title="Enrollments :: Dashboard" />
@endsection

@section('other_css')
    <link rel="stylesheet" href="{{ asset('assets/styles/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/styles/tabs.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/styles/student-dashboard.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/styles/file-upload.css') }}">
@endsection

@section('content')
    <!-- <img style="height: 100px; width: 100px; border-radius: 50%; border: 1px solid red;" src="/Image1.png" alt=""> -->

    <section id="form-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="rounded px-5 py-3 my-3 my-md-2 " style="background-color: #ffffff">
                        <div class="">
                            <h4>
                                <div>Payments History</div>
                            </h4>

                        </div>
                        <hr />
                        <div class="row py-3">
                            <div class="custom-vertical-tabs">
                                <div class="tab-buttons">
                                    <button class="tab-btn active" data-tab="approved">Approved</button>
                                    <button class="tab-btn" data-tab="profile">Pending</button>
                                    <button class="tab-btn" data-tab="messages">Declined</button>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="approved">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                    <tr>
                                                        <th>S/N</th>
                                                        <th>Student Name</th>
                                                        <th>Amount </th>
                                                        <th>Status</th>
                                                        <th>Transaction Reference</th>
                                                        <th>Currency</th>
                                                        <th>Receipt</th>

                                                    </tr>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($approvedPayments as $payment)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $payment->student->name }}</td>
                                                            @php
                                                                $currencySymbol =
                                                                    $payment->currency == 'ngn' ? '&#8358;' : '$';
                                                            @endphp
                                                            <td>{!! $currencySymbol !!}{{ $payment->amount_due }}</td>
                                                            <td class="text-success">{{ $payment->status }}</td>
                                                            <td>{{ $payment->transaction_reference }}</td>
                                                            <td>{{ Str::ucfirst($payment->currency) }}</td>
                                                            <td><a href="{{ asset('storage/uploads/' . $payment->payment_receipt) }}"
                                                                    target="_blank"><img class="rounded me-2"
                                                                        alt="payment-receipt" width="80"
                                                                        src="{{ asset('storage/uploads/' . $payment->payment_receipt) }}"
                                                                        data-holder-rendered="true"></a></td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="7" class="text-danger">You have no approved
                                                                payments yet!!</td>

                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                            {!! $approvedPayments->withQueryString()->links('pagination::bootstrap-5') !!}

                                        </div>

                                    </div>
                                    <div class="tab-pane" id="profile">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                    <tr>
                                                        <th>S/N</th>
                                                        <th>Student Name</th>
                                                        <th>Amount </th>
                                                        <th>Status</th>
                                                        <th>Transaction Reference</th>
                                                        <th>Currency</th>
                                                        <th>Receipt</th>

                                                    </tr>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($pendingPayments as $payment)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $payment->student->name }}</td>
                                                            @php
                                                                $currencySymbol =
                                                                    $payment->currency == 'ngn' ? '&#8358;' : '$';
                                                            @endphp
                                                            <td>{!! $currencySymbol !!}{{ $payment->amount_due }}</td>
                                                            <td class="text-success">{{ $payment->status }}</td>
                                                            <td>{{ $payment->transaction_reference }}</td>
                                                            <td>{{ Str::ucfirst($payment->currency) }}</td>
                                                            <td><a href="{{ asset('storage/uploads/' . $payment->payment_receipt) }}"
                                                                    target="_blank"><img class="rounded me-2"
                                                                        alt="payment-receipt" width="80"
                                                                        src="{{ asset('storage/uploads/' . $payment->payment_receipt) }}"
                                                                        data-holder-rendered="true"></a></td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="7" class="text-danger">You have no pending
                                                                payments yet!!</td>

                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                            {!! $pendingPayments->withQueryString()->links('pagination::bootstrap-5') !!}

                                        </div>

                                    </div>
                                    <div class="tab-pane" id="messages">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                    <tr>
                                                        <th>S/N</th>
                                                        <th>Student Name</th>
                                                        <th>Amount </th>
                                                        <th>Status</th>
                                                        <th>Transaction Reference</th>
                                                        <th>Currency</th>
                                                        <th>Receipt</th>

                                                    </tr>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($declinedPayments as $payment)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $payment->student->name }}</td>
                                                            @php
                                                                $currencySymbol =
                                                                    $payment->currency == 'ngn' ? '&#8358;' : '$';
                                                            @endphp
                                                            <td>{!! $currencySymbol !!}{{ $payment->amount_due }}</td>
                                                            <td class="text-danger">{{ $payment->status }}</td>
                                                            <td>{{ $payment->transaction_reference }}</td>
                                                            <td>{{ Str::ucfirst($payment->currency) }}</td>
                                                            <td><a href="{{ asset('storage/uploads/' . $payment->payment_receipt) }}"
                                                                    target="_blank"><img class="rounded me-2"
                                                                        alt="payment-receipt" width="80"
                                                                        src="{{ asset('storage/uploads/' . $payment->payment_receipt) }}"
                                                                        data-holder-rendered="true"></a></td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="7" class="text-danger">You have no decined
                                                                payments!!</td>

                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                            {!! $declinedPayments->withQueryString()->links('pagination::bootstrap-5') !!}

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 mt-2">
                    <x-parent-profile :parentInfo="$parentInfo" />
                </div>
            </div>


    <div class="row">
      <div class="col-lg-9">
        {{-- <div class="d-flex justify-content-between align-items-center">
          <h5 class="pt-3 text-color text-center text-lg-start">
            Billing History
          </h5>

        </div>


        <div class="p-4 bg-white rounded">
          <div class="border-bottom d-flex justify-content-between mb-3 ">
            <div>
              <p class="mb-2">Learning Yorùbá for Children (Intro Class) </p>
              <h6>₦ 30,000</h6>
            </div>
            <div>
              <p class="mb-2">Adeniji Matilda</p>
              <h6>25/01/2025</h6>
            </div>

          </div>
          <div class="border-bottom d-flex justify-content-between mb-3">
            <div>
              <p class="mb-2">Learning Yorùbá for Children (Intro Class) </p>
              <h6>₦ 30,000</h6>
            </div>
            <div>
              <p class="mb-2">Adeniji Matilda</p>
              <h6>25/01/2025</h6>
            </div>

          </div>
          <div class="border-bottom d-flex justify-content-between">
            <div>
              <p class="mb-2">Learning Yorùbá for Children (Intro Class) </p>
              <h6>₦ 30,000</h6>
            </div>
            <div>
              <p class="mb-2">Adeniji Matilda</p>
              <h6>25/01/2025</h6>
            </div>

          </div>

        </div> --}}
      </div>

      <div class="col-lg-3 my-4 my-md-4">
        <x-chat-us :parentInfo="$parentInfo"/>
        
      </div>
    </div> 


        </div>
    </section>
    @include('pages.parents.includes.edit')
    <script src="{{ asset('assets/scripts/file-upload.js') }}"></script>
    <script src="{{ asset('assets/scripts/tabs.js') }}"></script>
@endsection
