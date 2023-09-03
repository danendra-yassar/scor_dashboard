<?php

  include 'koneksi.php';

  $sql = mysqli_query($koneksi,"SELECT * FROM tb_user, tb_role_user 
  WHERE tb_user.id_role = tb_role_user.id_role AND id_user='$_GET[update]'");

  $data = mysqli_fetch_array($sql);
?>

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
                                <input type="text" class="form-control" name="nama_user" value="<?php echo $data['nama_user']; ?>">
                              </div>
                              <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" value="<?php echo $data['username']; ?>">
                              </div>
                              <div class="form-group">
                                <label for="pass_user">Password</label>
                                <input type="password" class="form-control" name="pass_user" value="<?php echo $data['pass_user']; ?>">
                              </div>
                              <div class="form-group">
                                <label for="jabatan_user">Jabatan</label>
                                <input type="text" class="form-control" name="jabatan_user" value="<?php echo $data['jabatan_user']; ?>">
                              </div>
                              <div class="form-group">
                                <label for="email_user">Email address</label>
                                <input type="email" class="form-control" name="email_user" value="<?php echo $data['email_user']; ?>">
                              </div>
                              <div class="form-group">
                                <label for="email_user">Role User</label>
                                  <select name="id_role" id="id_role">                                  
                                    <?php
                                      echo "<option value=$data[id_role]>$data[role_user]</option>";
                                      $query = mysqli_query($koneksi, "SELECT * FROM tb_role_user") or die (mysqli_connect_error($koneksi));
                                      while ($data = mysqli_fetch_array($query)){
                                        echo "<option value=$data[id_role]> $data[role_user]</option>";
                                      }
                                    ?>                                                         
                                  </select>                                
                              </div>                            
                              <button type="submit" name="edit_data" class="btn btn-primary me-2">Perbarui</button>
                              <a href="?page=data_user_view"><input type="button "class="btn btn-danger" value="Kembali"></a>
                      </form>
              </div>
  </div>
</div>

<?php
    include "koneksi.php";

    if(isset($_POST['edit_data'])){

    mysqli_query($koneksi,"UPDATE tb_user SET
                          nama_user = '$_POST[nama_user]',
                          username = '$_POST[username]',
                          pass_user = '$_POST[pass_user]',
                          jabatan_user = '$_POST[jabatan_user]',
                          email_user = '$_POST[email_user]',
                          id_role = '$_POST[id_role]' WHERE id_user=$_GET[update]");
                          
        echo "<script>alert('Data Berhasil Diperbarui!');
        document.location='?page=data_user_view'</script>";

    }
?>