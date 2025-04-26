$(document).on('click', '[data-bs-toggle="modal"]', function(e) {
  e.preventDefault();

  var target = $(this).data('bs-target');

  var $modal = $(target);
  var $form = $modal.closest('form');

  $form.appendTo('body');
  $modal.modal('show');
});