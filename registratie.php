<?php
include "header.php";
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
<!-- <link rel="stylesheet" href="/resources/demos/style.css"/> -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link href="css/registratie.css" rel="stylesheet" />
<!-- container-fluid -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">
        Hardware <small> registratie</small>
      </h1>
    </div>
  </div>
  <!--  /.Page Heading> -->

  <!-- hardware type and title row -->
  <?php
  $stmt = $dbh->prepare('SELECT HID, hardwareType FROM hardwaretype ORDER BY HID ASC');
  $stmt->execute();
  $output = $stmt->fetchall();
  ?>
  <div class="row">
    <form method="post" action="php/update.php">
      <p id="hardwaretype">Kies de hardware
        <select name="hardwareType" required>
          <option value="" >-- Selecteer hardware --</option>
            <?php
            foreach ($output as $hardware) {
              echo "<option value=" . $hardware['HID'] . ">" . $hardware['hardwareType'] .  "</option>";
            }
            ?>
          <option value="other">maak nieuwe type</option>
        </select>
        <div class="hardwareTitel">
          hardware titel: <label id="hardwareTitle"><input name="hardware_title" type="text" placeholder="e.g. LAP001, COM001, TV001" size="25" /></label>
        </div>
      </p>
  </div>
  <!-- /.hardware type and title row -->
  <!-- other hardware row -->
  <div class="row">
    <div id="hardwareother">
      specificeren aub: <label id="hardwarelabel"><input name="other_hardware" type="text" placeholder="Maak nieuwe hardware aan" size="25" /></label>
    </div>
  </div>
  <!-- /.other hardware row -->
  <!-- manufacturer row -->
  <?php
  $stmt = $dbh->prepare('SELECT MID, manufacturerName FROM manufacturer ORDER BY MID ASC');
  $stmt->execute();
  $output = $stmt->fetchall();
  ?>
  <div class="row">
    <p>Kies fabrikant
      <select name="manufacturer" required>
        <option value="" >-- Selecteer fabrikant --</option>
        <?php
        foreach ($output as $fabrikant) {
          echo "<option value=" . $fabrikant['MID'] . ">" . $fabrikant['manufacturerName'] .  "</option>";
        }
        ?>
        <option value="other">maak nieuwe fabrikant</option>
      </select>
    </p>
  </div>
  <!-- /.manufacturer row -->
  <!-- other manufacturer row -->
  <div class="row">
    <div id="manufacturerother">
      specificeren aub: <label id="fabrikantlabel"><input name="Other_manufacturer" type="text" placeholder="Maak nieuwe fabrikant aan" size="25" /></label>
    </div>
  </div>
  <!-- /.other manufacturer row -->
  <!-- reseller row -->
  <?php
  $stmt = $dbh->prepare('SELECT RID, resellerName FROM reseller ORDER BY RID ASC');
  $stmt->execute();
  $output = $stmt->fetchall();
  ?>
  <div class="row">
    <p id="reseller">kies winkel
      <select name="reseller" required>
        <option value="" >-- Selecteer winkel --</option>
        <?php
        foreach ($output as $reseller) {
          echo "<option value=" . $reseller['RID'] . ">" . $reseller['resellerName'] .  "</option>";
        }
        ?>
        <option value="other">maak nieuwe Winkel</option>
      </select>
      <div class="hardwarePrice">
        hardware prijs: €<input type="number" name="hardwarePrice" min="1" required />
      </div>
    </p>
  </div>
  <!-- /.reseller row -->
  <!-- other reseller row -->
  <div class="row">
    <div id="resellerother">
      specificeren aub: <label id="resellerlabel"><input name="Other_reseller" type="text" placeholder="Maak nieuwe reseller aan" size="25" /></label>
    </div>
  </div>
  <!-- /.other reseller row -->
  <!-- serie number row -->
  <div class="row">
    serial nummer: <label id="serialnumberlabel"><input name="serial_number" type="text" placeholder="het serie nummer aub" size="25" required /></label>
  </div>
  <!-- /.serie number row -->
  <!-- bought date and warranty Duration row -->
  <div class="row">
    <div id="boughtdate">
      <p>datum gekocht: <label id="boughtdatelabel"><input type="text" name="dateBought" id="datepicker" placeholder="datum van aankoop"></label></p>
    </div>
    <div id="warrantyDuration">
      years warrenty<label id="warrantyDurationlabel"><input id="warranty_duration" name="warranty_duration" type="number" placeholder="aantal jaren garantie" min="1" size="25" required /></label>
      levenlang<label id="livelongwarranty"><input id="livelong_warranty" name="livelongWarranty" type="checkbox"  /></label>
    </div>
  </div>
  <!-- /.bought date and warrenty durationrow -->
  <!-- user name row -->
  <div class="row">

  </div>
  <!-- /.user name row -->
  <!-- hardware status row -->
  <div class="row">
    <?php
    $stmt = $dbh->prepare('SELECT SID, status FROM status ORDER BY SID ASC');
    $stmt->execute();
    $output = $stmt->fetchall();
    ?>
    <p id="statusPara">kies status
      <select name="status" id="status" required>
        <option value="" >-- Selecteer status --</option>
        <?php
        foreach ($output as $status) {
          echo "<option value=" . $status['SID'] . ">" . $status['status'] .  "</option>";
        }
        ?>
      </select>
    </p>
    <div class="userHardware">
      naam gebruiker <label id="userlabel"><input id="userOfHardware" name="userOfHardware" type="text" placeholder="naam van de gebruiker" size="25" required /></label>
    </div>
  </div>
  <!-- /.hardware status row -->
  <!-- end form row -->
  <div class="row">
      <input type="submit" name="submit" class="btn btn-primary" value="registreren"/>
      <input type="reset" class="btn btn-warning" value="reset" />
    </form>
  </div>
<!-- /.container-fluid -->

<script src="js/addrequired.js"></script>
<script src="js/hiddenfield.js"></script>
<script src="js/datepicker.js"></script>

<?php
include "footer.php"
?>
