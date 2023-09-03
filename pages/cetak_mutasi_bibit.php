<?php
// Require composer autoload
require_once __DIR__ . '/vendor/autoload.php';
// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf();

// Connect DB
include 'koneksi.php';

$nama_dokumen='Berita Acara Permohonan Bibit' ;
ob_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Permohonan Bibit</title>

</head>
<body>

    <!-- Kop Surat -->
    <table style="border: 0">
        <thead>
            <tr>
                <td>
                    <img src="assets/img/logo_blora.png" alt="Logo Pemerintah Kabupaten Blora"  style="margin-left: 40px; margin-right: 40px; widht: 90;height: 90">
                </td>
                <td>
                    <div style="margin-left: 60px; margin-right: 20px">
                        <center>
                        <font style=" font-size: 16px; font-weight: bold">PEMERINTAH PROVINSI JAWA TENGAH</font><br>
                        <font style=" font-size: 16px; font-weight: bold">DINAS LINGKUNGAN HIDUP DAN KEHUTANAN</font><br>
                        <font style=" font-size: 18px">CABANG DINAS KEHUTANAN WILAYAH 1</font><br>
                        <font style=" font-size: 12px">Jl. Gelanggang Olahraga No. 6, Kode Pos 58219 Telepon 0296-533230</font>
                        </center>
                    </div>
                </td>
            </tr>
        </thead>
    </table>

    <!-- GET DATA -->
    <?php
    
        $sql = "SELECT * FROM tb_jenis_bibit, tb_mutasi_bibit WHERE tb_jenis_bibit.id_jenis_bibit = tb_mutasi_bibit.id_jenis_bibit AND id_mutasi_bibit='$_GET[cetak]'";
        $result = mysqli_query($koneksi, $sql);

        $data_pemohon = mysqli_fetch_array($result);
    ?>

    <!-- Outline -->
    <hr>

    <!-- Tempat dan Tanggal -->
    <p style="text-align: right">Blora,<?php echo date('d-m-Y', strtotime($data_pemohon['tanggal_permohonan']))?></p>

    <!-- Data Pemohon -->
    <Table>
        <thead>
            <tr>
                <td>Nomor</td>
                <td>:</td>
            </tr>
            <tr>
                <td>Lampiran</td>
                <td>:</td>
                <td>-</td>
            </tr>
            <tr>
                <td>Perihal</td>
                <td>:</td>
                <td>
                    <p style=" text-decoration: underline;">Permohonan Bantuan Bibit</p>
                </td>
            </tr>
        </thead>
    </Table>

    <div>
        <div class="text">
            <p style="text-align: justify">Dalam rangka mendukung program rehabilitasi hutan dan lahan di wilayah kerja Cabang Dinas Kehutanan Provinsi Jawa Tengah Wilayah I,
                bersama ini kami sampaikan  permohonan bantuan bibit tanaman kehutnan dengan rincian sebagai berikut :</p>
        </div>
    </div>

    <table style="margin-left: auto; margin-right: auto">
        <tbody>
            <tr>
                <td>Nama Pemohon</td>
                <td>:</td>
                <td><?php echo $data_pemohon['nama_pemohon']; ?></td>
            </tr>
            <tr>
                <td>Alamat Pemohon</td>
                <td>:</td>
                <td><?php echo $data_pemohon['alamat_pemohon']; ?></td>
            </tr>
            <tr>
                <td>Kontak Pemohon</td>
                <td>:</td>
                <td><?php echo $data_pemohon['kontak_pemohon']; ?></td>
            </tr>
            <tr>
                <td>Jenis Bibit</td>
                <td>:</td>
                <td><?php echo $data_pemohon['jenis_bibit']; ?></td>
            </tr>
            <tr>
                <td>Banyaknya Bibit</td>
                <td>:</td>
                <td><?php echo $data_pemohon['stok_bibit_mutasi']; ?></td>
            </tr>
        </tbody>
    </table>

    <div>
        <div class="text">
            <p style="text-align: justify">Bibit Tersebut akan di distribusikan kepada yang bersangkutan untuk ditanam sesuai dengan lokasi pemohon
                                            dengan tujuan untuk <?php echo $data_pemohon['keperluan_permohonan']; ?>.</p>
            <p style="text-align: justify">Demikian kami sampaikan, atas kerjasama dan bantuannya kami mengucapkan terima kasih.</p>
        </div>
    </div>

    <br><br>

    <!-- TTD -->
    <table align="right">
        <tbody>
            <tr>
                 <td>KEPALA CABANG DINAS KEHUTANAN</td>
            </tr>
            <tr>
                <td style="text-align: right; padding-right: 25px">PROVINSI JAWA TENGAH WIL. I</td>
            </tr>
            <br><br><br><br><br><br>
            <tr>
                <td><p style="text-decoration: underline">BAMBANG DOSO PRAMONO,S.hut,M.P</p></td>
            </tr>
            <tr>
                <td style="text-align: right; padding-right: 115px"><p style="font-size:10px">Pembina</p></td>
            </tr>
            <tr>
                <td style="text-align: right; padding-right: 70px"><p style="font-size:10px">NIP. 19720926 199803 1 007</p></td>
            </tr>
        </tbody>
    </table>
   
</body>
</html>

<?php
// Output a PDF file directly to the browser
$html = ob_get_contents();
ob_end_clean();

$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen. ".pdf", 'I');
?>