<?php

include "/php/opendb.php";

class NewManufacturer {
  private $newManufacturer;

  function __construct($otherManufacturerVar) {
    this::$newManufacturer = $otherManufacturerVar;
    $params = array(":value1" => $newManufacturer);
    $stmt = $dbh->prepare('INSERT INTO manufacturer(manufacturerName) VALUES(:value1)');
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
