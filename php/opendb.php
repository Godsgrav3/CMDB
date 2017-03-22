<?php

$host   = "localhost";
$dbname = "cmdb";
$dbu    = "cmdbuser";
$dbp    = "<FP7dFpCEu";

try {
  $dbh = new PDO("mysql:host=$host;dbname=$dbname", $dbu, $dbp);
} catch (Exception $e) {
  echo $e->getMessage();
}

?>
