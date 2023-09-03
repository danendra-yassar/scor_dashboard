<div class="content-wrapper">
  <div class="card">
              <div class="card-body">
                  <h1 class="card-title">Tambah Data User</h1>
                      <p class="card-description">
                              Silahkan Isi Data Diri Sesuai Identitas User
                      </p>
                      <form class="forms-sample" action="" method="POST">
                              <div class="form-group">
                                <label for="nama_user">Nama User</label>
                                <input type="text" class="form-control" name="nama_user" id="nama_user" placeholder="Masukkan Nama">
                              </div>
                              <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username Baru">
                              </div>
                              <div class="form-group">
                                <label for="pass_user">Password</label>
                                <input type="password" class="form-control" name="pass_user" id="pass_user" placeholder="Masukkan Password">
                              </div>
                              <div class="form-group">
                                <label for="jabatan_user">Jabatan</label>
                                <input type="text" class="form-control" name="jabatan_user" id="jabatan_user" placeholder="Masukkan Jabatan">
                              </div>
                              <div class="form-group">
                                <label for="email_user">Email address</label>
                                <input type="email" class="form-control" name="email_user" id="email_user" placeholder="Masukkan Email">
                              </div>
                              <div class="form-group">
                                <label for="email_user">Role User</label>
                                  <select name="id_role" id="id_role">
                                    <option disabled selected>---</option>
                                    <?php
                                      include "koneksi.php";
                                      $query = mysqli_query($koneksi, "SELECT * FROM tb_role_user") or die (mysqli_connect_error($koneksi));
                                      while ($data = mysqli_fetch_array($query)){
                                        echo "<option value=$data[id_role]> $data[role_user]</option>";
                                      }
                                    ?>                                                         
                                  </select>                                
                              </div>                            
                              <button type="submit" name="simpan_data" class="btn btn-primary me-2">Submit</button>
                              <button class="btn btn-danger">Cancel</button>
                      </form>
              </div>
  </div>
</div>

<?php
    include "koneksi.php";

    if(isset($_POST['simpan_data'])){

                        $simpan_data = mysqli_query($koneksi,"INSERT INTO tb_user (nama_user, username, pass_user, jabatan_user, email_user, id_role)
                                                    VALUE (
                                                      '$_POST[nama_user]',
                                                      '$_POST[username]',
                                                      '$_POST[pass_user]',
                                                      '$_POST[jabatan_user]',
                                                      '$_POST[email_user]',
                                                      '$_POST[id_role]'
                                                      )
                                                  ");
                          if($simpan_data){
                              echo "<script>
                                  alert('Data Sukses Tersimpan!');
                                  document.location='?page=data_user_view';
                              </script>";
                          } else {
                            echo "<script>
                                  alert('Data Gagal Tersimpan!');
                                  document.location='?page=data_user_tambah';
                              </script>";
                          }
    }
                      
?>