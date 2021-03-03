<?php
error_reporting(0);
include '../config/koneksi.php';
//bagian deklarasi 
$id = $_GET['id'];


$sql = mysqli_query($koneksi,"DELETE FROM wisata WHERE id_wisata='$id'");
if ($sql == TRUE) {
echo "<script> alert ('Proses Hapus Wisata Berhasil');
window.location='wisata.php'; </script>";
} else {
echo "<script> alert ('Proses Hapus WIsata Gagal');
history.back(); </script>";
}
?>