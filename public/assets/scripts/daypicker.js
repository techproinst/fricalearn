$("#daypicker").datepicker( { 
  changeYear: false, 
  dateFormat: 'MM-dd',
}).focus(function () {
  $(".ui-datepicker-year").hide();
});