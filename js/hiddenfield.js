$('select[name=hardware_type]').change(function(e){
  if ($('select[name=hardware_type]').val() == 'other'){
    $('#hardwareother').show();
  }else{
    $('#hardwareother').hide();
  }
});

$('select[name=manufacturer]').change(function(e){
  if ($('select[name=manufacturer]').val() == 'other'){
    $('#manufacturerother').show();
  }else{
    $('#manufacturerother').hide();
  }
});

$('select[name=reseller]').change(function(e){
  if ($('select[name=reseller]').val() == 'other'){
    $('#resellerother').show();
  }else{
    $('#resellerother').hide();
  }
});
