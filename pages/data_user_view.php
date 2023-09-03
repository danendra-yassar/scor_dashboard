<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h1 class="card-title">Data User</h1>
                  <div class="table-responsive pt-3">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Username</th>
                          <th>Password</th>
                          <th>Jabatan</th>
                          <th>Email</th>
                          <th>Role User</th>
                          <th style="text-align:center" colspan="2">Opsi</th>
                        </tr>
                      </thead>

                      <?php
                        include "koneksi.php";

                        $no = 1;

                        $get_data = mysqli_query($koneksi,"SELECT * FROM tb_user, tb_role_user
                        WHERE tb_user.id_role = tb_role_user.id_role");

                        while ($show = mysqli_fetch_array($get_data)){
                      ?>
                          <tbody>
                                <td> <?php echo $no++ ?></td>
                                <td> <?php echo $show['nama_user']?></td>
                                <td> <?php echo $show['username']?></td>
                                <td> <?php echo $show['pass_user']?></td>
                                <td> <?php echo $show['jabatan_user']?></td>
                                <td> <?php echo $show['email_user']?></td>
                                <td> <?php echo $show['role_user']?></td>
                                <?php 
                                echo "
                                  <td>
                                    <a href='?page=data_user_edit&update=$show[id_user]'>
                                      <input type='button' class='btn btn-info' value='Perbarui'>
                                    </a>
                                  </td>
                                  <td>                                   
                                    <a href='?page=data_user_view&data_user=$show[id_user]'>
                                        <input type='button' class='btn btn-danger' value='Hapus'>
                                      </a>	 
                                  </td>
                                 "				
                                  ?>
                          </tbody>
                        <?php }  ?>
                      </table>
                  </div>
            </div>
        </div>
    </div>
</div>

<?php
  
  if (isset($_GET['data_user'])){

    mysqli_query($koneksi,"DELETE FROM tb_user WHERE id_user='$_GET[data_user]'");

    echo "<script>
            alert('Data Berhasil Terhapus!');
            document.location='?page=data_user_view';
          </script>";
  }
?>