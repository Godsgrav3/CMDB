<!-- This class counts how many product there are from a given hardware type(e.g. monitor, laptop) -->

<?php
require('php/opendb.php');

class CountHardware {
  private $hardwareType;
  private $output;
  private $hardwareCount;

  function __construct($hardwareType) {
    $this->hardwareType = $hardwareType;
    global $dbh;
    // get hardwareType ID from database
    $params = array(':hardwareType' => $this->hardwareType);
    $stmt = $dbh->prepare('SELECT HID FROM hardwaretype WHERE hardwareType = :hardwareType');
    $stmt->execute($params);
    $hardwareID = $stmt->fetch();
    // use hardwareID to count products with that hardwareID
    $params = array(':HID' => $hardwareID['HID']);
    $stmt = $dbh->prepare('SELECT COUNT(ID) FROM hardware WHERE hardwareType = :HID');
    $stmt->execute($params);
    $this->output = $stmt->fetch();
    // give the COUNT value to $hardwareCount to return
    $this->hardwareCount = $this->output['COUNT(ID)'];
  }

  function returnCount() {
    return $this->hardwareCount;
  }
}

?>
