<?php
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$hapus = $_GET['id_user'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"DELETE FROM tb_user WHERE id_user='$hapus'");
 
// mengalihkan halaman kembali ke index.php
header("location:index.php?page=data_user_view");
 
?>