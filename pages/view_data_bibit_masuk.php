<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h1 class="card-title">Data Bibit</h1>
                  <div class="table-responsive pt-3">
                    <table class="table table-striped">

                      <!-- Judul Isi Tabel -->
                      <thead>
                        <tr>
                          <th style="text-align:center">#</th>
                          <th style="text-align:center">Tanggal Bibit Masuk</th>
                          <th style="text-align:center">Sumber Bibit</th>
                          <th style="text-align:center">Jenis Bibit</th>
                          <th style="text-align:center">Jumlah Bibit</th>
                          <th style="text-align:center">Keterangan</th>
                          <th style="text-align:center" colspan="2">Opsi</th>
                        </tr>
                      </thead>

                      <!-- SQL -->
                      <?php
                        include "koneksi.php";

                        $no = 1;

                        $get_data = mysqli_query($koneksi,"SELECT * FROM tb_jenis_bibit, tb_bibit_masuk
                        WHERE tb_jenis_bibit.id_jenis_bibit = tb_bibit_masuk.id_jenis_bibit");

                        while ($show = mysqli_fetch_array($get_data)){
                      ?>

                      <!-- Isi Tabel -->
                      <tbody>
                        <tr>
                          <td> <?php echo $no++ ?></td>
                                  <td style="text-align:center"> <?php echo date('d-m-Y', strtotime($show['tanggal_bibit_masuk']))?></td>
                                  <td> <?php echo $show['sumber_bibit']?></td>
                                  <td style="text-align:center"> <?php echo $show['jenis_bibit']?></td>
                                  <td style="text-align:center"> <?php echo $show['stok_bibit_masuk']?></td>
                                  <td> <?php echo $show['keterangan_bibit']?></td>
                                  <?php 
                                  echo "
                                    <td>
                                      <a href='?page=edit_data_bibit_masuk&update=$show[id_bibit_masuk]'>
                                        <input type='button' class='btn btn-info' value='Perbarui'>
                                      </a>
                                    </td>
                                    <td>                                   
                                      <a href='?page=view_data_bibit_masuk&hapus=$show[id_bibit_masuk]'>
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

    mysqli_query($koneksi,"DELETE FROM tb_bibit_masuk WHERE id_bibit_masuk='$_GET[hapus]'");

    echo "<script>
            alert('Data Berhasil Terhapus!');
            document.location='?page=view_data_bibit_masuk';
          </script>";
   
  }
?>