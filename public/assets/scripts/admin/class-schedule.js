$(document).ready(function() {
  // Initialize Active and Expired tables
  var activeTable = $('#state-schedule-datatable').DataTable({
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
     
  });
});