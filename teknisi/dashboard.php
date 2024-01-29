<?php
session_start();


if (!isset($_SESSION["username"])) {
  header("Location:../index.php");
  exit;
}

$id_user = $_SESSION["id_user"];
$username = $_SESSION["username"];
$name = $_SESSION["name"];
$email = $_SESSION["email"];
?>
<?php include "../connection/connect.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="description" content="Miminium Admin Template v.1">
  <meta name="author" content="Isna Nur Azis">
  <meta name="keyword" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../assets/favicon.ico" />
  <title>Laporan Alat Rusak </title>

  <!-- start: Css -->
  <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">

  <!-- plugins -->
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/font-awesome.min.css" />
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/simple-line-icons.css" />
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/animate.min.css" />
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/fullcalendar.min.css" />
  <link href="asset/css/style.css" rel="stylesheet">
  <!-- end: Css -->

  <link rel="shortcut icon" href="asset/img/BMKG.png">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body id="mimin" class="dashboard">
  <!-- start: Header -->
  <nav class="navbar navbar-default header navbar-fixed-top">
    <div class="col-md-12 nav-wrapper">
      <div class="navbar-header" style="width:100%;">
        <div class="opener-left-menu is-open">
          <span class="top"></span>
          <span class="middle"></span>
          <span class="bottom"></span>
        </div>
        <a href="index.php" class="navbar-brand">
          <b>Laporan Alat Rusak</b>
        </a>
      </div>
    </div>
  </nav>
  <!-- end: Header -->

  <div class="container-fluid mimin-wrapper">
    <!-- start:Left Menu -->
    <div id="left-menu">
      <div class="sub-left-menu scroll">
        <ul class="nav nav-list">
          <li>
            <div class="left-bg"></div>
          </li>
          <li class="time">
            <h1 class="animated fadeInLeft"></h1>
            <p class="animated fadeInRight"></p>
          </li>
          <li class="active ripple">
            <a class="tree-toggle nav-header"><span class="fa-home fa"></span> Dashboard
              <span class="fa-angle-right fa right-arrow text-right"></span>
            </a>
          </li>
          <li class="ripple"><a class="tree-toggle nav-header"><span class="fa fa-table"></span> Data <span
                class="fa-angle-right fa right-arrow text-right"></span> </a>
            <ul class="nav nav-list tree">
              <li><a href="datatables.php">Data Laporan</a></li>
            </ul>
          </li>
          <li><a href = "../logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
    <!-- end: Left Menu -->


    <!-- start: content -->
    <div id="content">
      <div class="panel">
        <div class="panel-body">
          <div class="col-md-6 col-sm-12">
            <h3 class="animated fadeInLeft">Teknisi</h3>
            <p class="animated fadeInDown"><span class="fa  fa-map-marker"></span> Makassar ,Indonesia</p>
          </div>
          <div class="col-md-6 col-sm-12">
            <div class="col-md-6 col-sm-6 text-right" style="padding-left:10px;">
              <h3 style="color:#DDDDDE;"><span class="fa  fa-map-marker"></span> Makassar</h3>
              <h1 style="margin-top: -10px;color: #ddd;">30<sup>o</sup></h1>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="wheather">
                <div class="stormy rainy animated pulse infinite">
                  <div class="shadow">

                  </div>
                </div>
                <div class="sub-wheather">
                  <div class="thunder">

                  </div>
                  <div class="rain">
                    <div class="droplet droplet1"></div>
                    <div class="droplet droplet2"></div>
                    <div class="droplet droplet3"></div>
                    <div class="droplet droplet4"></div>
                    <div class="droplet droplet5"></div>
                    <div class="droplet droplet6"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12 padding-0" style="display: flex;">
        <div class="col-md-4" style="flex: 1;">
          <div class="panel box-v1">
            <div class="panel-body text-center">
              <?php $status_order = isset($_POST['order'][0]['dir']) ? $_POST['order'][0]['dir'] : 'desc';
              $tampil = mysqli_query($connect, "SELECT * FROM pelapor1 ORDER BY id $status_order");
              $total = mysqli_num_rows($tampil);
              ?>
              <h1>
                <?php echo "$total"; ?>
              </h1>
              <p>Jumlah Laporan</p>
              <hr />
            </div>
          </div>
        </div>

        <div class="col-md-4" style="flex: 1;">
          <div class="panel box-v1">
            <div class="panel-body text-center">
              <?php $status_order1 = isset($_POST['order'][0]['dir']) ? $_POST['order'][0]['dir'] : 'desc';
              $tampil1 = mysqli_query($connect, "SELECT * FROM pelapor1 WHERE status = 'Laporan Terkirim' ORDER BY id $status_order1");
              $total1 = mysqli_num_rows($tampil1);
              ?>
              <h1>
                <?php echo "$total1"; ?>
              </h1>
              <p>Laporan Belum Diproses</p>
              <hr />
            </div>
          </div>
        </div>
        <div class="col-md-4" style="flex: 1;">
          <div class="panel box-v1">
            <div class="panel-body text-center">
              <?php $status_order2 = isset($_POST['order'][0]['dir']) ? $_POST['order'][0]['dir'] : 'desc';
              $tampil2 = mysqli_query($connect, "SELECT * FROM pelapor1 WHERE status = 'Sedang Diproses' ORDER BY id $status_order2");
              $total2 = mysqli_num_rows($tampil2);
              ?>
              <h1>
                <?php echo "$total2"; ?>
              </h1>
              <p>Laporan Sedang Diproses</p>
              <hr />
            </div>
          </div>
        </div>
        <div class="col-md-4" style="flex: 1;">
          <div class="panel box-v1">
            <div class="panel-body text-center">
              <?php $status_order3 = isset($_POST['order'][0]['dir']) ? $_POST['order'][0]['dir'] : 'desc';
              $tampil3 = mysqli_query($connect, "SELECT * FROM pelapor1 WHERE status = 'Selesai' ORDER BY id $status_order3");
              $total3 = mysqli_num_rows($tampil3);
              ?>
              <h1>
                <?php echo "$total3"; ?>
              </h1>
              <p>Laporan Selesai Diproses</p>
              <hr />
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--- start: Mobile --->
    <div id="mimin-mobile" class="reverse">
      <div class="mimin-mobile-menu-list">
        <div class="col-md-12 sub-mimin-mobile-menu-list animated fadeInLeft">
          <ul class="nav nav-list">
            <li class="active ripple">
              <a class="tree-toggle nav-header" href="dashboard.php"><span class="fa-home fa"></span> Dashboard <span
                  class="fa-angle-right fa right-arrow text-right"></span>
              </a>
            </li>
            <li class="ripple">
              <a class="tree-toggle nav-header">
                <span class="fa fa-table"></span> Data
                <span class="fa-angle-right fa right-arrow text-right"></span>
              </a>
              <ul class="nav nav-list tree">
                <li><a href="datatables.php"> Data Laporan</a></li>
              </ul>
            </li>
        </div>
      </div>
    </div>
    <button id="mimin-mobile-menu-opener" class="animated rubberBand btn btn-circle btn-danger">
      <span class="fa fa-bars"></span>
    </button>
    <!-- end: Mobile -->

    <!-- start: Javascript -->
    <script src="asset/js/jquery.min.js"></script>
    <script src="asset/js/jquery.ui.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>


    <!-- plugins -->
    <script src="asset/js/plugins/moment.min.js"></script>
    <script src="asset/js/plugins/fullcalendar.min.js"></script>
    <script src="asset/js/plugins/jquery.nicescroll.js"></script>
    <script src="asset/js/plugins/jquery.vmap.min.js"></script>
    <script src="asset/js/plugins/maps/jquery.vmap.world.js"></script>
    <script src="asset/js/plugins/jquery.vmap.sampledata.js"></script>
    <script src="asset/js/plugins/chart.min.js"></script>


    <!-- custom -->
    <script src="asset/js/main.js"></script>

    <!-- end: Javascript -->
</body>

</html>