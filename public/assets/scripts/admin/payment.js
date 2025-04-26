$(document).ready(function() {
  // Initialize Active and Expired tables
  var activeTable = $('#state-active-datatable').DataTable({
      responsive: {
          details: {
              type: 'column',
              target: 'tr'
          }
      },
      columnDefs: [
          { className: 'control', orderable: false, targets: 0 }
      ],
      stateSave: true
  });

  var expiredTable = $('#state-expired-datatable').DataTable({
      responsive: {
          details: {
              type: 'column',
              target: 'tr'
          }
      },
      columnDefs: [
          { className: 'control', orderable: false, targets: 0 }
      ],
      stateSave: true
  });

  // Initialize Pending, Approved, and Declined tables
  var pendingTable = $('#state-pending-datatable').DataTable({
      responsive: {
          details: {
              type: 'column',
              target: 'tr'
          }
      },
      columnDefs: [
          { className: 'control', orderable: false, targets: 0 }
      ],
      stateSave: true
  });

  var approveTable = $('#state-approve-datatable').DataTable({
      responsive: {
          details: {
              type: 'column',
              target: 'tr'
          }
      },
      columnDefs: [
          { className: 'control', orderable: false, targets: 0 }
      ],
      stateSave: true
  });

  var declineTable = $('#state-decline-datatable').DataTable({
      responsive: {
          details: {
              type: 'column',
              target: 'tr'
          }
      },
      columnDefs: [
          { className: 'control', orderable: false, targets: 0 }
      ],
      stateSave: true
  });

  // Adjust columns when switching tabs (for the first two tables)
  $('a[data-bs-toggle="pill"]').on('shown.bs.tab', function (e) {
      activeTable.columns.adjust().responsive.recalc();
      expiredTable.columns.adjust().responsive.recalc();
      pendingTable.columns.adjust().responsive.recalc();
      approveTable.columns.adjust().responsive.recalc();
      declineTable.columns.adjust().responsive.recalc();
  });

  
});