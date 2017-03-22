<?php

include "../php/opendb.php";
class UpdateDatabase {
  private $host   = "localhost";
  private $dbname = "cmdb";
  private $dbu    = "cmdbuser";
  private $dbp    = "<FP7dFpCEu";

  function __construct($query, $params) {
    $dbh = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->dbu, $this->dbp);
    $stmt = $dbh->prepare($query);
    $stmt->execute($params);
  }
}

?>
