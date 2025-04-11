@extends('layouts.admin')

@section('content')


<div class="row">
  <div class="col-lg-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0">Student Menu</h4>

      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
          <li class="breadcrumb-item active">Student Information</li>
        </ol>
      </div>

    </div>
  </div>
</div>
<!-- end page title -->
<style>
  th,
  td {
    padding: 10px 20px;
    width: 600px;
  }

  table,
  tr,
  th,
  td {
    border: none
  }
</style>


<div class="row">

  <div class="col-lg-10">
    <div class="card">
      <div class="card-body">

        <h4 class="card-title mb-4">Student Information</h4>
        <div class="table-responsive">
          <table class="table ">
            <tr>
              <th>Parent Name</th>
              <td>{{ $studentInfo->parent->name }}</td>
            </tr>
            <tr>
              <th>Parent Email</th>
              <td>{{ $studentInfo->parent->email }}</td>
            </tr>
            <tr>
              <th>Student Name</th>
              <td>{{ $studentInfo->name }}</td>
            </tr>
            <tr>
              <th>Birthday</th>
              <td>{{ $studentInfo->birthday }}</td>
            </tr>
            <tr>
              <th>gender</th>
              <td>{{ $studentInfo->gender }}</td>
            </tr>

            @forelse ($studentInfo->studentCourseLevels as $studentLevel )
            <tr>
              <th>Course</th>
              <td>{{ $studentLevel->level->course->name}}</td>
            </tr>
            <tr>
              <th>Course Level</th>
              <td>{{ $studentLevel->level->level}}</td>
            </tr>
            @empty
            <p class="text-danger">Student Course Details Not Available!!</p>
            @endforelse


          </table>
        </div>



      </div>
    </div>
    <!-- end card -->
  </div>



</div>



@endsection
{{-- @section('data_table_script')
<script>
  $('#state-saving-datatable').DataTable({
   stateSave: true
})
</script>
@endsection --}}