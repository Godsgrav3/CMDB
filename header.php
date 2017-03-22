<!DOCTYPE html>
<html lang="en">
<?php include "php/opendb.php"; ?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">hoofdpagina</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">

            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">

                    <?php
                    $stmt = $dbh->prepare('SELECT hardwareType FROM hardwaretype ORDER BY HID ASC');
                    $stmt->execute();
                    $output = $stmt->fetchall();
                    ?>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> hardware <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                          <?php
                          foreach ($output as $hardware) {
                            echo "<li>";
                              echo "<a href='hardwareOverview.php?type=" . $hardware['hardwareType'] . "'>" . $hardware['hardwareType'] . "</a>";
                            echo "</li>";
                          }
                          ?>
                        </ul>
                    </li>
                    <li>
                        <a href="registratie.php"><i class="fa fa-fw fa-edit"></i> Registratie</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <div id="page-wrapper">
