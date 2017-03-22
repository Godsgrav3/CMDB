<?php
include "header.php";
include "my_autoloader.php";
spl_autoload_register('my_autoloader');
?>

<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">
        Hardware <small>Overview</small>
      </h1>
    </div>
  </div>
  <?php
  $hardwareCount = new CountHardware($_GET['type']);
  $totalArticles = $hardwareCount->returnCount();
  if ($totalArticles > 0) {
    //calculate how many pages there will be
    $articlesPerPage = 12;
    $totalPages = ceil($totalArticles / $articlesPerPage);
    // Check that the page number is set.
  if(!isset($_GET['page'])){
    $_GET['page'] = 1;
  }else{
    // Convert the page number to an integer
    $_GET['page'] = (int)$_GET['page'];
  }
  //If the page number is less than 1, make it 1.
  if($_GET['page'] < 1){
    $_GET['page'] = 1;
    // Check that the page is below the last page
  }else if($_GET['page'] > $totalPages){
    $_GET['page'] = $totalPages;
  }



  // Calculate the starting number
  $startArticle = ($_GET['page'] - 1) * $articlesPerPage;

  $getHardware = new GetHardware();
  $getHardware->getHardwareOverview($_GET['type'], $startArticle, $articlesPerPage);
  $queryResult = $getHardware->returnResult();

  echo "<div class='row'>";
    foreach ($queryResult as $key => $value) {
      echo "<div class='col-lg-3'>";
        echo "<div class='panel panel-default'>";
          echo "<div class='panel-body' min-height='292.75'>";
            ?>
            <a href="hardware.php?ID=<?php echo $queryResult[$key]['ID']; ?>" target="_blank">
            <?php
              echo "<img src='images/gear_icon.png' align='right' />";
            echo "</a>";
            echo "<table>";
              // Title row
              echo "<tr>";
                echo "<td>";
                  echo "<b>Titel:</b>";
                echo "</td>";
                echo "<td>";
                  echo $queryResult[$key]['hardwareTitle'];
                echo "</td>";
              echo "</tr>";
              // serialnumber row
              echo "<tr>";
                echo "<td>";
                  echo "<b>S/N:</b>";
                echo "</td>";
                echo "<td>";
                  echo $queryResult[$key]['serialNumber'];
                echo "</td>";
              echo "</tr>";
              // Date bought row
              echo "<tr>";
                echo "<td>";
                  echo "<b>aankoop datum:</b>";
                echo "</td>";
                echo "<td>";
                  $newDate = date("d-m-Y", strtotime($queryResult[$key]['dateBought']));
                  echo $newDate;
                echo "</td>";
              echo "</tr>";
              // status row
              echo "<tr>";
                echo "<td>";
                  echo "<b>status:</b>";
                echo "</td>";
                echo "<td>";
                  $params = array(':SID' => $queryResult[$key]['status']);
                  $stmt = $dbh->prepare('SELECT status FROM status WHERE SID = :SID');
                  $stmt->execute($params);
                  $status = $stmt->fetch();
                  echo $status['status'];
                echo "</td>";
              echo "</tr>";
              // user row
              if ($queryResult[$key]['status'] == 2) {
                echo "<tr>";
                  echo "<td>";
                    echo "<b>gebruiker:</b>";
                  echo "</td>";
                  echo "<td>";
                    echo $queryResult[$key]['user'];
                  echo "</td>";
                echo "</tr>";
              }
              // still in warranty duration
              echo "<tr>";
                echo "<td>";
                  echo "<b>nog garantie:</b>";
                echo "</td>";
                echo "<td>";
                  $todaysDate = date_create(date('Y-m-d'));
                  $dateBought = date_create($queryResult[$key]['dateBought']);
                  $warrantyDuration = $queryResult[$key]['warrantyDuration'];
                  date_add($dateBought, date_interval_create_from_date_string($warrantyDuration . ' years'));
                  if ($todaysDate < $dateBought || $queryResult[$key]['liveLongWarranty'] == 1){
                    echo "<font color='green'>ja</font>";
                  }else {
                    echo "<font color='red'>nee</font>";
                  }

                echo "</td>";
              echo "</tr>";

            echo "</table>";
          echo "</div>";
        echo "</div>";
      echo "</div>";
    }

    }else {
      echo "Er is geen hardware geregistreerd met het type: " . $_GET['type'];
    }
  echo "</div>";
  ?>
  <!-- /.row -->
  <?php
  if(isset($totalPages)) {
    foreach(range(1, $totalPages) as $page){
      if($page == 1 || $page == $totalPages || ($page >= $_GET['page'] - 2 && $page <= $_GET['page'] + 2)){
          // echo '<a href="?page=' . $page . '&type=' . $_GET['type'] . '">' . $page . '</a>';
      }
    }

    foreach(range(1, $totalPages) as $page){
      // Check if we're on the current page in the loop
      if($page == $_GET['page']){
          echo '<span class="currentpage">' . $page . '</span>';
      }else if($page == 1 || $page == $totalPages || ($page >= $_GET['page'] - 2 && $page <= $_GET['page'] + 2)){
          echo '<a href="?page=' . $page . '&type=' . $_GET['type'] . '">' . $page . '</a>';
      }
    }
  }
  ?>

</div>
<!-- /.container-fluid -->

<?php
include "footer.php";
?>
