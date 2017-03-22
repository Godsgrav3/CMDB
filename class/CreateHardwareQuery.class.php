<?php

class CreateHardwareQuery {
  // all variables that can be used
  private $insertInto;
  private $values;

  function __construct() {
    // MySQL query
    $this->insertInto = 'INSERT INTO hardware(hardwareType, hardwareTitle, manufacturer, reseller, hardwarePrice, serialNumber, dateBought';
    $this->values     = 'VALUES(:hardwareType, :hardwareTitle, :manufacturer, :reseller, :hardwarePrice, :serialNumber, :dateBought';
  }

  // create hardware with limited warranty
  public function withLimitedWarranty() {
    // MySQL query
    $this->insertInto .= ', warrantyDuration';
    $this->values     .= ', :warrantyDuration';
  }

  // create hardware with livetime warranty
  public function withLivelongWarranty() {
    // MySQL query
    $this->insertInto .= ', livelongWarranty';
    $this->values     .= ', :livelongWarranty';
  }

  // create hardware that is not in use (e.g. in storage, stolen, RMA)
  public function hardwareNotInUse() {
    // MySQL query
    $this->insertInto .=', status';
    $this->values     .=', :status';
  }

  // create hardware that is in use from the beginning.
  public function hardwareInUSe() {
    // MySQL query
    $this->insertInto .= ', status, user';
    $this->values     .= ', :status, :user';
  }

  public function returnQuery() {
    // MySQL query
    $this->insertInto .= ')';
    $this->values     .= ')';
    return $this->insertInto . " " . $this->values;
  }
}

?>
