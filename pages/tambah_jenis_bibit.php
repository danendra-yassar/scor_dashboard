<!-- Form Input Data Jenis Bibit Baru -->

<div class="content-wrapper">
  <div class="card">
              <div class="card-body">
                  <h1 class="card-title">Data Bibit</h1>
                      <p class="card-description">
                              From Isian Data Bibit Masuk
                      </p>
                      <form class="forms-sample" action="" method="POST">
                              <div class="form-group">
                                <label for="jenis_bibit">Jenis Bibit</label>
                                <input type="text" class="form-control" name="jenis_bibit" id="jenis_bibit" placeholder="Tambahkan Jenis Bibit Baru">
                              </div>
                              <div class="form-group">
                                <label for="stok_aktif">Stok Aktif</label>
                                <input type="text" class="form-control" name="stok_aktif" id="stok_aktif" placeholder="Tambahkan Stok Aktif">
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

                        $simpan_data = mysqli_query($koneksi,"INSERT INTO tb_jenis_bibit (jenis_bibit, stok_aktif)
                                                    VALUE (
                                                      '$_POST[jenis_bibit]',
                                                      '$_POST[stok_aktif]'                                                     
                                                      )
                                                  ");
                          if($simpan_data){
                              echo "<script>
                                  alert('Data Sukses Tersimpan!');
                                  document.location='index.php?page=tambah_jenis_bibit';
                              </script>";
                          } else {
                            echo "<script>
                                  alert('Data Gagal Tersimpan!');
                                  document.location='?page=tambah_jenis_bibit';
                              </script>";
                          }
    }
                      
?>

<!-- Form Input Update  Data Stok Bibit Masuk -->

<!-- Tabel List Data Bibit Aktif -->

<div class="content-wrapper">
    <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h1 class="card-title">Data Jenis Bibit Aktif</h1>
                  <div class="table-responsive pt-3">
                    <table class="table table-striped">

                      <!-- Judul Isi Tabel -->
                      <thead>
                        <tr>
                          <th style="text-align:center">No</th>
                          <th style="text-align:center">Jenis Bibit</th>
                          <th style="text-align:center">Stok Aktif</th>
                          <th style="text-align:center">Opsi</th>
                        </tr>
                      </thead>

                      <!-- SQL -->
                      <?php
                        include "koneksi.php";

                        $no = 1;

                        $get_data = mysqli_query($koneksi,"SELECT * FROM tb_jenis_bibit");

                        while ($show = mysqli_fetch_array($get_data)){
                      ?>

                      <!-- Isi Tabel -->
                      <tbody>
                        <tr>
                          <td> <?php echo $no++ ?></td>
                                  <td style="text-align:center"> <?php echo $show['jenis_bibit']?></td>
                                  <td style="text-align:center"> <?php echo $show['stok_aktif']?></td>
                                  <?php 
                                    echo "
                                      <td>                                   
                                        <a href='?page=tambah_jenis_bibit&hapus=$show[id_jenis_bibit]'>
                                            <input type='button' class='btn btn-danger' value='Hapus'>
                                          </a>	 
                                      </td>
                                    "				
                                ?>
                        </tr>
                      </tbody>

                      <?php } ?>

                      <!-- End -->
                      
                    </table>
                  </div>
            </div>
        </div>
    </div>
</div>

<?php
  
  if (isset($_GET['hapus'])){

    mysqli_query($koneksi,"DELETE FROM tb_jenis_bibit WHERE id_jenis_bibit='$_GET[hapus]'");

    echo "Data Berhasil Dihapus!";
    echo "<script>
            alert('Data Berhasil Terhapus!');
            document.location='?page=tambah_jenis_bibit';
          </script>";
  }
?>