<?php

class NewReseller {
  private $newReseller;

  function __construct($newResellerVar) {
    this::$newReseller = $newResellerVar;
    $params = array("value1" => $newReseller);
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
