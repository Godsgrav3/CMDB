<?php

include '../my_autoloader.php';
spl_autoload_register('my_autoloader');

if (isset($_POST['submit'])) {
  $hardwareValue = array();
  if ($_POST['hardwareType'] == 'other'){
      $a = new NewHardwareType($_POST['other_hardware']);
  }else {
    $hardwareValue[':hardwareType'] = $_POST['hardwareType'];
  }
  if ($_POST['manufacturer'] == 'other') {
    $a = new NewManufacturer($_POST['Other_manufacturer']);
  }else {
    $hardwareValue[':manufacturer'] = $_POST['manufacturer'];
  }
  if ($_POST['reseller'] == 'other') {
    $a = new NewReseller($_POST['Other_reseller']);
  }else {
    $hardwareValue[':reseller'] = $_POST['reseller'];
  }
  $hardwareValue[':hardwareTitle']     = $_POST['hardware_title'];
  $hardwareValue[':hardwarePrice']     = $_POST['hardwarePrice'];
  $hardwareValue[':serialNumber']      = $_POST['serial_number'];
  $hardwareValue[':dateBought']        = date("Y-m-d", strtotime(str_replace("/", "-", urldecode($_POST['dateBought']))));
  $hardwareValue[':status']            = $_POST['status'];

  $newHardware = new CreateHardwareQuery($hardwareValue[':hardwareType'], $hardwareValue[':hardwareTitle'], $hardwareValue[':manufacturer'], $hardwareValue[':reseller'], $hardwareValue[':hardwarePrice'], $hardwareValue[':serialNumber'], $hardwareValue[':dateBought']);

  if (!empty($_POST['userOfHardware']) && $_POST['status'] == 2) {
    $hardwareValue[':user']            = $_POST['userOfHardware'];
    $newHardware->hardwareInUSe();
  }else {
    $newHardware->hardwareNotInUse();
  }

  if(isset($_POST['livelongWarranty'])){
    $hardwareValue[':livelongWarranty'] = 1;
    $newHardware->withLivelongWarranty();
  }else {
    $hardwareValue[':warrantyDuration']  = $_POST['warranty_duration'];
    $newHardware->withLimitedWarranty();
  }

  $query = $newHardware->returnQuery();

  if (isset($query) && !empty($query)) {
    var_export($hardwareValue);
    echo "<br />";
    var_export($query);
    $databseUpdate = new UpdateDatabase($query, $hardwareValue);
  }
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();

?>
