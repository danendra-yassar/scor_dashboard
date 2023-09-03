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
                  <h1 class="card-title">Data Bibit</h1>
                      <p class="card-description">
                              From Isian Data Bibit Masuk
                      </p>
                      <form class="forms-sample" action="" method="POST">
                              <div class="form-group col-md-3">
                                <label for="tanggal_bibit_masuk">Tanggal Bibit Masuk</label>
                                <input type="date" class="form-control" name="tanggal_bibit_masuk" id="date" placeholder="Pilih Tanggal">
                              </div>
                              <div class="form-group">
                                <label for="sumber_bibit">Sumber Bibit</label>
                                <input type="text" class="form-control" name="sumber_bibit" id="sumber_bibit" placeholder="Masukkan Asal Bibit">
                              </div>
                              <div class="form-group">
                                <label for="email_user">Jenis Bibit</label>
                                  <select name="id_jenis_bibit" id="id_jenis_bibit">
                                    <option disabled selected class="form-control">---</option>
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
                                <label for="stok_bibit_masuk">Jumlah Bibit</label>
                                <input type="text" class="form-control" name="stok_bibit_masuk" id="stok_bibit_masuk" placeholder="Masukkan Banyaknya Bibit yang Diterima">
                              </div>
                              <div class="form-group">
                                <label for="keterangan_bibit">Keterangan</label>
                                <textarea class="form-control" name="keterangan_bibit" id="keterangan_bibit" rows="4" placeholder="Keterangan Bibit Masuk"></textarea>
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

                        $simpan_data = mysqli_query($koneksi,"INSERT INTO tb_bibit_masuk (tanggal_bibit_masuk, sumber_bibit, id_jenis_bibit, stok_bibit_masuk, keterangan_bibit)
                                                    VALUE (
                                                      '$_POST[tanggal_bibit_masuk]',
                                                      '$_POST[sumber_bibit]',
                                                      '$_POST[id_jenis_bibit]',
                                                      '$_POST[stok_bibit_masuk]',
                                                      '$_POST[keterangan_bibit]'                                                      
                                                      )
                                                  ");
                          if($simpan_data){
                              echo "<script>
                                  alert('Data Sukses Tersimpan!');
                                  document.location='?page=view_data_bibit_masuk';
                              </script>";
                          } else {
                            echo "<script>
                                  alert('Data Gagal Tersimpan!');
                                  document.location='?page=data_bibit_tambah';
                              </script>";
                          }
    }
                      
?>