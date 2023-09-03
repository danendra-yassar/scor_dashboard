<head>
	<script>
	$( function() {
		$( "#date" ).datepicker({
		dateFormat: "dd/mm/yyyy"
		});
	} );
	</script>
</head>

<div class="content-wrapper">
  <div class="card">
        <div class="card-body">
                  <h1 class="card-title">Mutasi Bibit</h1>
                      <form class="forms-sample" action="" method="POST">
                              <div class="form-group col-md-3">
                                <label for="tanggal_permohonan">Tanggal Permohonan</label>
                                <input type="date" class="form-control" name="tanggal_permohonan" id="date">
                              </div>
                              <div class="form-group">
                                <label for="nama_pemohon">Nama Pemohon</label>
                                <input type="text" class="form-control" name="nama_pemohon" id="nama_pemohon" placeholder="Masukkan Nama Pemohon">
                              </div>
                              <div class="form-group">
                                <label for="alamat_pemohon">Alamat Pemohon</label>
                                <input type="text" class="form-control" name="alamat_pemohon" id="alamat_pemohon" placeholder="Masukkan Alamat Pemohon">
                              </div>
                              <div class="form-group">
                                <label for="kontak_pemohon">Kontak Pemohon</label>
                                <input type="text" class="form-control" name="kontak_pemohon" id="kontak_pemohon" placeholder="Masukkan No. HP Pemohon">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputtext1">Jenis Bibit Yang Diminta</label>
                                <select name="id_jenis_bibit" id="id_jenis_bibit">
                                    <option disabled selected>---</option>
                                    <?php
                                      include "koneksi.php";
                                      $query = mysqli_query($koneksi, "SELECT * FROM tb_jenis_bibit") or die (mysqli_connect_error($koneksi));
                                      while ($data = mysqli_fetch_array($query)){
                                        echo "<option value=$data[id_jenis_bibit]> $data[jenis_bibit]</option>";
                                      }
                                    ?>                                                         
                                  </select>               
                              </div>
                              <div class="form-group">
                                <label for="stok_bibit_mutasi">Jumlah Bibit</label>
                                <input type="text" class="form-control" name="stok_bibit_mutasi" id="stok_bibit_mutasi" placeholder="Banyaknya Bibit Keluar">
                              </div>
                              <div class="form-group">
                                <label for="keperluan_permohonan">Keperluan Permohonan Bibit</label>
                                <textarea class="form-control" name="keperluan_permohonan" id="keperluan_permohonan" rows="4"></textarea>
                              </div>
                              <button type="submit" name="simpan_data" class="btn btn-primary me-2">Submit</button>
                              <button class="btn btn-light">Cancel</button>
                      </form>
        </div>
  </div>
</div>

<?php
    include "koneksi.php";

    if(isset($_POST['simpan_data'])){

                        $simpan_data = mysqli_query($koneksi,"INSERT INTO tb_mutasi_bibit (tanggal_permohonan, nama_pemohon, alamat_pemohon, kontak_pemohon, id_jenis_bibit, stok_bibit_mutasi, keperluan_permohonan)
                                                    VALUE (
                                                      '$_POST[tanggal_permohonan]',
                                                      '$_POST[nama_pemohon]',
                                                      '$_POST[alamat_pemohon]',
                                                      '$_POST[kontak_pemohon]',
                                                      '$_POST[id_jenis_bibit]',
                                                      '$_POST[stok_bibit_mutasi]',
                                                      '$_POST[keperluan_permohonan]'                                                      
                                                      )
                                                  ");
                          if($simpan_data){
                              echo "<script>
                                  alert('Data Sukses Tersimpan!');
                                  document.location='?page=view_mutasi_bibit';
                              </script>";
                          } else {
                            echo "<script>
                                  alert('Data Gagal Tersimpan!');
                                  document.location='?page=tambah_mutasi_bibit';
                              </script>";
                          }
    }
                      
?>