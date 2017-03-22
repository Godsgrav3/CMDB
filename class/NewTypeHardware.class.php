<?php

include "/php/opendb.php";

class NewTypeHardware {
  private $newTypeHardware;

  function __construct($otherhardwareVar) {
    this::$newTypeHardware = $otherhardwareVar;
    $params = array("value1" => $newTypeHardware);
    $stmt = $dbh->prepare('INSERT INTO hardwaretype(hardwreType) VALUES(:value1)');
    $stmt->execute($params);
    $count = $stmt->rowCount();
    if (checkQuerySucces($count)) {
      return true;
    }else {
      return fasle;
    }
  }

  private function checkQuerySucces($amount) {
    if ($amount == 1){
      return true;
    }else {
      return false;
    }
  }
}

?>
