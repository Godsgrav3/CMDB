$('#livelong_warranty').on('change', function() {
  $('#warranty_duration').attr('required', !$('#livelong_warranty').is(":checked"));
  console.log($('#warranty_duration').attr('required'));
});

$("#status").on('change', function() {
    if ($(this).val() == '2'){
        $('#userOfHardware').attr('required', true);
    } else {
        $('#userOfHardware').removeAttr('required');
    }
});
