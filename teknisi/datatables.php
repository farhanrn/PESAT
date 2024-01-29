<?php include "../connection/connect.php"; 

session_start();


if (!isset($_SESSION["username"])) {
  header("Location:../index.php");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Alat Rusak </title>
 
    <!-- start: Css -->
    <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">

      <!-- plugins -->
      <link rel="stylesheet" type="text/css" href="asset/css/plugins/font-awesome.min.css"/>
      <link rel="stylesheet" type="text/css" href="asset/css/plugins/simple-line-icons.css"/>
      <link rel="stylesheet" type="text/css" href="asset/css/plugins/animate.min.css"/>
      <link rel="stylesheet" type="text/css" href="asset/css/plugins/fullcalendar.min.css"/>
	    <link href="asset/css/style.css" rel="stylesheet">
	<!-- end: Css -->

	<link rel="shortcut icon" href="asset/img/BMKG.png">
  <link rel="icon" href="../assets/favicon.ico" />
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
  <style>
    .sedang-diproses-button {
    background-color: orangered;
    color: blanchedalmond;
  }

    button[data-status='Selesai']:active,
    button[data-status='Selesai']:focus {
    background-color: green; /* Change the background color to your desired color */
    color: white; /* Change the text color to contrast with the background */
    }

    .button-completed {
        background-color: green; /* Change the background color to your desired color */
        color: white; /* Change the text color to contrast with the background */
      }

      .sembunyikan {
          display: none;
}
  </style>
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
                <a href="dashboard.php" class="navbar-brand"> 
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
                    <li><div class="left-bg"></div></li>
                    <li class="time">
                      <h1 class="animated fadeInLeft"></h1>
                      <p class="animated fadeInRight"></p>
                    </li>
                    <li class="active ripple">
                      <a href="dashboard.php" class="tree-toggle nav-header"><span class="fa-home fa" ></span> Dashboard <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                    </li>                   
                    <li class="ripple"><a class="tree-toggle nav-header"><span class="fa fa-table"></span> Data <span class="fa-angle-right fa right-arrow text-right"></span> </a>
                      <ul class="nav nav-list tree">
                        <li><a href="datatables.php">Data Laporan</a></li>
                      </ul>
                    </li> 
                    <li><a href = "../logout.php">Logout</a></li>
                  </ul>
                </div>
            </div>
            <!-- end: Left Menu -->
            
            <!-- Start : Content-->
            <div id="content">
              <div class="panel box-shadow-none content-header">
                 <div class="panel-body">
                   <div class="col-md-12">
                       <h3 class="animated fadeInLeft">Data Laporan</h3>
                   </div>
                 </div>
             </div>
             <div class="col-md-12 top-20 padding-0">
               <div class="col-md-12">
                 <div class="panel">
                   <div class="panel-heading"><h3>Laporan yang masuk</h3></div>
                   
                   <div class="panel-body">

                     <div class="responsive-table">
                     <table id="teknisi-table" class="table table-striped table-bordered" width="100%" cellspacing="0">
                     <thead>
                       <tr>
                         <th>No</th>
                         <th>Tanggal Laporan</th>
                         <th>Nama Pelapor</th>
                         <th>Nama Teknisi</th>
                         <th>Nama Alat</th>
                         <th>Deskripsi Kerusakan</th>
                         <th>Gambar Alat</th>
                         <th>Status</th>
                       </tr>
                     </thead>
                     <tbody>
                     </tbody>
                       </table>
                     </div>
                 </div>
               </div>
             </div>  
             </div>
           </div>


           <!-- Mobile -->
           <div id="mimin-mobile" class="reverse">
            <div class="mimin-mobile-menu-list">
                <div class="col-md-12 sub-mimin-mobile-menu-list animated fadeInLeft">
                    <ul class="nav nav-list">
                      <li class="active ripple">
                        <a class="tree-toggle nav-header" href="index.php"><span class="fa-home fa"></span> Dashboard 
                          <span class="fa-angle-right fa right-arrow text-right"></span>
                        </a>
                      </li>
                        <li class="ripple">
                          <a class="tree-toggle nav-header">
                            <span class="fa fa-table"></span>Data
                            <span class="fa-angle-right fa right-arrow text-right"></span>
                          </a>
                          <ul class="nav nav-list tree">
                            <li><a href="datatables.php">Data Laporan</a></li>
                          </ul>
                        </li>
                </div>
            </div>       
          </div>
          <button id="mimin-mobile-menu-opener" class="animated rubberBand btn btn-circle btn-danger">
            <span class="fa fa-bars"></span>
          </button>

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

    <script>

document.addEventListener('DOMContentLoaded', function () {
    lightbox.option({
      'resizeDuration': 200,
      'wrapAround': true
    });

    // Add event listener to close Lightbox when clicking outside the image
    var overlay = document.querySelector('.lightboxOverlay');
    overlay.addEventListener('click', function () {
      lightbox.close();
    });
  });
    <?php include '../connection/connect.php'; 
    $no = 1;
    $sql = "SELECT * FROM pelapor1";
    $result = $connect->query($sql);
    $data = array();
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          $data[] = $row;
      }
  }
  
  echo "var startingNo = $no;";
  echo json_encode($data);
  
  $connect->close();
    ?>

    var data = <?php echo json_encode($data); ?>;
    var startingNo = <?php echo $no; ?>;
    var statusMap = {}; // Menyimpan status masing-masing entitas
    
    console.log(data)
    document.addEventListener("DOMContentLoaded", function () {
    // Dummy data for demonstration purposes
    // var data = <?php echo json_encode($data); ?>;
    var tbody = document.querySelector("#teknisi-table tbody");
  
    // Render data in the table
    data.forEach(function (item) {
      var status = (item.status == "Sedang Diproses") ? "sedang-diproses-button" :  "";
      var statusButton = "";
      if (item.status === "Selesai") {
        statusButton = "button-completed";
        status = "sembunyikan";
      }
      
      // css = status == "Sedang Diproses" ? "sedang-diproses-button"
      var row = document.createElement("tr");
      row.innerHTML = `
        <td>${startingNo++}</td>
        <td>${item.tanggal}</td>
        <td>${item.nama_pelapor}</td>
        <td>${item.nama_teknisi}</td>
        <td>${item.alat}</td>
        <td>${item.deskripsi_kerusakan}</td>
        <td>
          <a href="../alat/${item.foto}" data-lightbox="images" data-title="${item.foto}">
            <img src="../alat/${item.foto}" alt="${item.foto}" style="max-width: 100px;">
          </a>
        </td>
        <td>
          <button data-id="${item.id}" class="${status}" data-status="Sedang Diproses" onclick="changeStatus(this)">Sedang Diproses</button>
          <button data-id="${item.id}" class="${statusButton}" data-status="Selesai" onclick="changeStatus(this)">Selesai</button>
        </td>
      `;


      // Inisialisasi statusMap dengan status awal
      statusMap[item.id] = item.status;
      tbody.appendChild(row);
    });
  });
  
  function changeStatus(button) {
  var dataId = button.getAttribute("data-id");
  var newStatus = button.getAttribute("data-status");

  // Menemukan tombol "Sedang Diproses" yang sesuai dengan dataId
  var sedangDiprosesButton = document.querySelector(`button[data-status="Sedang Diproses"][data-id="${dataId}"]`);


  // Kirim permintaan ke server untuk memperbarui status di database
  fetch('update-status.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({ id: dataId, status: newStatus }),
  })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        // Berhasil memperbarui status, tambahkan logika UI di sini jika diperlukan
        console.log('Status berhasil diperbarui:', data);
        
        // Update statusMap dengan status baru
        statusMap[dataId] = newStatus;

        // Sesuaikan tampilan berdasarkan status
        updateView(dataId);
        
        } else {
       // Gagal memperbarui status, handle kesalahan di sini
        console.error('Gagal memperbarui status:', data.error);
        }
      })
    .catch(error => {
      // Handle error
      console.error('Error:', error);
    });
}

// Fungsi untuk memperbarui tampilan berdasarkan status
function updateView(dataId) {
  var sedangDiprosesButton = document.querySelector(`button[data-status="Sedang Diproses"][data-id="${dataId}"]`);
  var selesaiButton = document.querySelector(`button[data-status="Selesai"][data-id="${dataId}"]`);

  if (statusMap[dataId] === "Sedang Diproses") {
    sedangDiprosesButton.innerText = "Sedang Diproses";
    sedangDiprosesButton.classList.add("sedang-diproses-button");
  } else if (statusMap[dataId] === "Selesai") {
    sedangDiprosesButton.style.display = "none";
    selesaiButton.classList.add("button-completed");
  }
}


        </script>
        
  </body>
</html>
