

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login CDK 1 SCOR Analytics</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/logo_cdk.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="../images/logo_cdk.png" alt="logo">
              </div>

              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>

              <form class="pt-3" method="POST" action="">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="pass_user" placeholder="Password" required>
                </div>
                <div class="mt-3">
                  <button type="submit" name="login" class="btn btn-primary me-2">Submit</button>
                </div>
              </form>

              <br><br>

              <div class="cotainer">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                  <div class="card-body">
                  
                  <!-- notifikasi -->
                  <?php 
                      if(isset($_GET['pesan'])){
                        if($_GET['pesan'] == "gagal"){
                          echo "Login gagal! username atau password salah!";
                        }
                      }
                  ?>
                  
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <?php
        include 'koneksi.php';
        
        error_reporting(0);
        
        session_start();

        if(isset($_POST['login'])){
          $sql = mysqli_query($koneksi,"SELECT * FROM tb_user WHERE username = '$_POST[username]' and pass_user = '$_POST[pass_user]'");

          $cek = mysqli_num_rows($sql);
      
          if($cek > 0){
              $_SESSION['username'] = $_POST['username'];

              header("Location:../index.php");
          }
          else{
              header("location:login.php?pesan=gagal");
          }
        }
      ?>
		</div>
	</div>
</div>


      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../vendors/base/vendor.bundle.base.js"></>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <!-- endinject -->
</body>

</html>
