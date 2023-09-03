<head>
	<script>
	$( function() {
		$( "#date" ).datepicker({
		dateFormat: "dd/mm/yyyy"
		});
	} );
	</script>
</head>

<?php

  include 'koneksi.php';

  $sql = mysqli_query($koneksi,"SELECT * FROM tb_jenis_bibit, tb_bibit_masuk
                        WHERE tb_jenis_bibit.id_jenis_bibit = tb_bibit_masuk.id_jenis_bibit AND id_bibit_masuk='$_GET[update]'");

  $data = mysqli_fetch_array($sql);
?>

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
                                <input type="date" class="form-control" name="tanggal_bibit_masuk" id="date" value="<?php echo $data['tanggal_bibit_masuk']; ?>">
                              </div>
                              <div class="form-group">
                                <label for="sumber_bibit">Sumber Bibit</label>
                                <input type="text" class="form-control" name="sumber_bibit" id="sumber_bibit" value="<?php echo $data['sumber_bibit'];?>">
                              </div>
                              <div class="form-group">
                                <label for="email_user">Jenis Bibit</label>
                                  <select name="id_jenis_bibit" id="id_jenis_bibit">
                                    <?php
                                      echo "<option value=$data[id_jenis_bibit]>$data[jenis_bibit]</option>";

                                      include "koneksi.php";
                                      $query = mysqli_query($koneksi, "SELECT * FROM tb_jenis_bibit") or die (mysqli_connect_error($koneksi));
                                      while ($data = mysqli_fetch_array($query)){
                                        echo "<option value=$data[id_jenis_bibit]> $data[jenis_bibit]</option>";
                                      }
                                    ?>                                                         
                                  </select>                                
                              </div>      
                              <div class="form-group">
                                <label for="stok_bibit">Jumlah Bibit</label>
                                <input type="text" class="form-control" name="stok_bibit" id="stok_bibit" value="<?php echo $data['stok_bibit'];?>">
                              </div>
                              <div class="form-group">
                                <label for="keterangan_bibit">Keterangan</label>
                                <textarea class="form-control" name="keterangan_bibit" rows="4" value="<?php echo $data['keterangan_bibit'];?>"></textarea>
                              </div>         
                              <button type="submit" name="edit_data" class="btn btn-primary me-2">Submit</button>
                              <button class="btn btn-danger">Cancel</button>
                      </form>
              </div>
  </div>
</div>

<!-- POST EDIT -->
<?php
    include "koneksi.php";

    if(isset($_POST['edit_data'])){

    mysqli_query($koneksi,"UPDATE tb_bibit_masuk SET
                          tanggal_bibit_masuk = '$_POST[tanggal_bibit_masuk]',
                          sumber_bibit = '$_POST[sumber_bibit]',
                          stok_bibit = '$_POST[stok_bibit]',
                          keterangan_bibit = '$_POST[keterangan_bibit]',
                          id_jenis_bibit = '$_POST[id_jenis_bibit]' WHERE id_bibit_masuk=$_GET[update]");
                          
        echo "<script>alert('Data Berhasil Diperbarui!');
        document.location='?page=view_data_bibit_masuk'</script>";

    }
?>
