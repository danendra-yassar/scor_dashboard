<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h1 class="card-title">Data Permohonan Bibit</h1>
                  <div class="table-responsive pt-3">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Tanggal Permohonan</th>
                          <th> Nama Pemohon</th>
                          <th>Alamat Pemohon</th>
                          <th>Kontak Pemohon</th>
                          <th>Jenis Bibit</th>
                          <th>Jumlah</th>
                          <th>Keperluan Permohonan</th>
                          <th style="text-align:center" colspan="2">Opsi</th>
                        </tr>
                      </thead>

                      <!-- SQL -->
                      <?php
                        include "koneksi.php";

                        $no = 1;

                        $get_data = mysqli_query($koneksi,"SELECT * FROM tb_jenis_bibit, tb_mutasi_bibit
                        WHERE tb_jenis_bibit.id_jenis_bibit = tb_mutasi_bibit.id_jenis_bibit");

                        while ($show = mysqli_fetch_array($get_data)){
                      ?>

                      <tbody>
                          <tr>
                          <td> <?php echo $no++ ?></td>
                                  <td style="text-align:center"> <?php echo date('d-m-Y', strtotime($show['tanggal_permohonan']))?></td>
                                  <td> <?php echo $show['nama_pemohon']?></td>
                                  <td> <?php echo $show['alamat_pemohon']?></td>
                                  <td> <?php echo $show['kontak_pemohon']?></td>
                                  <td style="text-align:center"> <?php echo $show['jenis_bibit']?></td>
                                  <td style="text-align:center"> <?php echo $show['stok_bibit_mutasi']?></td>
                                  <td> <?php echo $show['keperluan_permohonan']?></td>
                                  <?php 
                                  echo "
                                    <td>
                                      <a href='pages/cetak_mutasi_bibit.php?cetak=$show[id_mutasi_bibit]' target='_BLANK'>
                                        <input type='button' class='btn btn-warning' value='Cetak'>
                                      </a>
                                    </td>
                                    <td>                                   
                                      <a href='?page=view_mutasi_bibit&hapus=$show[id_mutasi_bibit]'>
                                          <input type='button' class='btn btn-danger' value='Hapus'>
                                        </a>	 
                                    </td>
                                  "				
                                ?>
                        </tr>
                      </tbody>

                      <?php } ?>
                    </table>
                  </div>
            </div>
        </div>
    </div>
</div>

<?php
  
  if (isset($_GET['hapus'])){

    mysqli_query($koneksi,"DELETE FROM tb_mutasi_bibit WHERE id_mutasi_bibit='$_GET[hapus]'");

    echo "Data Berhasil Dihapus!";
    echo "<script>
            alert('Data Berhasil Terhapus!');
            document.location='?page=view_mutasi_bibit';
          </script>";
  }
?>