$( function() {
    $( "#datepicker" ).datepicker();
    $( "#datepicker" ).datepicker("option", "dateFormat", "dd/mm/yy")({
      showOtherMonths: true,
      selectOtherMonths: true
    });
  } );
