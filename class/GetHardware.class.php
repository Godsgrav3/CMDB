<?php

require('php/opendb.php');

class GetHardware {
  private $hardwareID;
  private $hardwareType;
  private $startArticle;
  private $articlesPerPage;
  private $output;

  function __construct() {
  }

  function getHardwareOverview($hardwareType, $startArticle, $articlesPerPage) {
    $this->hardwareType     = $hardwareType;
    $this->startArticle     = $startArticle;
    $this->articlesPerPage  = $articlesPerPage;
    // Set $dbh global so it can be used in this methode
    global $dbh;
    // SQL query get hardwareID
    // get hardwareType ID from database
    $params = array(':hardwareType' => $this->hardwareType);
    $stmt = $dbh->prepare('SELECT HID FROM hardwaretype WHERE hardwareType = :hardwareType');
    $stmt->execute($params);
    $hardwareID = $stmt->fetch();
    // SQL query get hardware
    $params = array(':hardwareType' => $hardwareID['HID']);
    $stmt = $dbh->prepare('SELECT ID, hardwareTitle, serialNumber, dateBought, status, user, warrantyDuration, liveLongWarranty
                           FROM hardware WHERE hardwareType = :hardwareType  LIMIT :startArticle , :articlesPerPage');
    $stmt->bindParam(':hardwareType', $hardwareID['HID'], PDO::PARAM_INT);
    $stmt->bindParam(':startArticle', $startArticle, PDO::PARAM_INT);
    $stmt->bindParam('articlesPerPage', $articlesPerPage, PDO::PARAM_INT);
    $stmt->execute();
    $this->output = $stmt->fetchall(PDO::FETCH_ASSOC);
  }

  function getHardware($hardwareID) {
    $this->hardwareID = $hardwareID;
    // Set $dbh global so it can be used in this methode
    global $dbh;
    // SQL query to get everything by InvalidArgumentException
    $params = array(':ID' => $this->hardwareID);
    $stmt = $dbh->prepare('SELECT * FROM hardware WHERE ID = :ID');
    $stmt->execute($params);
    $this->output = $stmt->fetchall(PDO::FETCH_ASSOC);
  }

  function returnResult() {
    return $this->output;
  }
}

?>
