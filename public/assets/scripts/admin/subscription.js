$(document).ready(function() {
  var activeTable = $('#state-active-datatable').DataTable({
      responsive: {
          details: {
              type: 'column', // Click the first column to expand
              target: 'tr'    // Expand the full row
          }
      },
      columnDefs: [
          { className: 'control', orderable: false, targets: 0 } // Add control to first column
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

  // Adjust when switching tabs
  $('a[data-bs-toggle="pill"]').on('shown.bs.tab', function (e) {
      activeTable.columns.adjust().responsive.recalc();
      expiredTable.columns.adjust().responsive.recalc();
  });
});