<?php

session_start();
if (!isset($_SESSION['username'])) {
  echo "<script>location.href='pages/login.php'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>CDK 1 SCOR Analytics</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <!-- Datepicker -->
  <script src="vendors/bootstrap-datepicker/locales/bootstrap-datepicker.id.min.js"></script>
</head>

<body>

<!-- main -->
  <div class="container-scroller">

    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center" style="background:#2caae1">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <a class="navbar-brand brand-logo" href="index.php"><img src="images/logo_cdk.png" alt="CDK 1 SUPPLY CHAIN ANALYTICS" style="width: 257px; height: 60px;"></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>

      <!-- header -->
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end" style="background:#a0cde1">
        
        <!-- Search Bar -->
        <!-- <ul class="navbar-nav mr-lg-4 w-100">
          <li class="nav-item nav-search d-none d-lg-block w-100">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="mdi mdi-magnify"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul> -->

        <ul class="navbar-nav navbar-nav-right"> 
          <li class="nav-item dropdown me-1">

            <!-- Message Bar -->
            <!-- <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-bs-toggle="dropdown">
              <i class="mdi mdi-message-text mx-0"></i>
              <span class="count"></span>
            </a> -->
          
          <!-- User Bar -->
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
              <!-- IMG Login -->
              <!-- <img src="images/faces/face5.jpg" alt="profile"/> -->
              <span class="nav-profile-name">Halo, <?php echo $_SESSION['username']; ?>!</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="pages/logout.php">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>

          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>

      <!-- end header -->
    </nav>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class=" sidebar sidebar-offcanvas" id="sidebar" >
        <ul class="nav">

        <!-- dashboard -->
          <li class="nav-item">
              <a class="nav-link" href="index.php">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>

        <!-- Data User -->
        <?php if($_SESSION['username'] == 'admin'){?>
          <li class="nav-item">
              <a
                class="nav-link"
                data-bs-toggle="collapse"
                href="#basic"
                aria-expanded="false"
                aria-controls="basic"
              >
                <i class="mdi mdi-account menu-icon"></i>
                <span class="menu-title">User</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="?page=data_user_tambah">
                      Tambah Data User
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="?page=data_user_view">
                      Data User
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <?php }else {?>
            <?php }?>

          
          <!-- Data Bibit -->
            <li class="nav-item">
              <a
                class="nav-link"
                data-bs-toggle="collapse"
                href="#ui-basic"
                aria-expanded="false"
                aria-controls="ui-basic"
              >
                <i class="mdi mdi-dialpad menu-icon"></i>
                <span class="menu-title">Data Bibit</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="?page=tambah_data_bibit"
                      >Tambah Data Bibit</a
                    >
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="?page=view_data_bibit_masuk"
                      >Data Stok Bibit</a
                    >
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="?page=tambah_jenis_bibit"
                      >Tambah Jenis Bibit</a
                    >
                  </li>
                </ul>
              </div>
            </li>

            <!-- Mutasi Bibit -->
            <li class="nav-item">
              <a
                class="nav-link"
                data-bs-toggle="collapse"
                href="#ui_mutasi"
                aria-expanded="false"
                aria-controls="ui_mutasi"
              >
                <i class="mdi mdi-truck menu-icon"></i>
                <span class="menu-title">Mutasi Bibit</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui_mutasi">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="?page=tambah_mutasi_bibit"
                      >Mutasi Bibit Baru</a
                    >
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="?page=view_mutasi_bibit"
                      >Data Mutasi Bibit</a
                    >
                  </li>
                </ul>
              </div>
            </li>

            <!-- SCOR -->
            <li class="nav-item">
              <a
                class="nav-link"
                data-bs-toggle="collapse"
                href="#scor"
                aria-expanded="false"
                aria-controls="scor"
              >
                <i class="mdi mdi-poll menu-icon"></i>
                <span class="menu-title">SCOR Analytics</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="scor">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="?page=hitung_scor_leveltiga">
                      Level 3
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="?page=hitung_scor_leveldua">
                      Level 2
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="?page=hitung_scor_levelsatu">
                      Level 1
                    </a>
                  </li>
                </ul>
              </div>
            </li>

          <!-- end -->
        </ul>
      </nav>

      <!-- partial -->
      <div class="main-panel">
        
        <!-- content-wrapper ends -->
            <?php
              if(isset($_GET['page']) == false)
                  {
                    // Tidak ada variabel $_GET['page']
                    $halaman = "home";
                  }
                    else
                    {
                      // Jika ada 'page'
                      $halaman = $_GET['page'];

                      // Cek Halaman Yang diminta
                      if(file_exists("pages/".$halaman.".php") == false)
                        {
                          // Bila tidak ada maka arahkan ke halaman khusus eror
                          $halaman = "404";
                        }
                    }
                require_once "pages/".$halaman.".php";
            ?>

        <!-- partial:partials/_footer.html -->
        <footer class="footer" style="background:#f9fafb">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
          <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright templates © <a href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com </a>2021</span>
          <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">CDK Provinsi Jawa Tengah Wilayah 1</span>
        </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/data-table.js"></script>
  <script src="js/jquery.dataTables.js"></script>
  <script src="js/dataTables.bootstrap4.js"></script>
  <!-- End custom js for this page-->

  <script src="js/jquery.cookie.js" type="text/javascript"></script>
</body>

</html>

