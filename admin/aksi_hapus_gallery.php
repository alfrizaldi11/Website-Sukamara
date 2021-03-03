<?php
error_reporting(0);
include '../config/koneksi.php';
//bagian deklarasi 
$id = $_GET['id'];


$sql = mysqli_query($koneksi,"DELETE FROM gallery WHERE id_gallery='$id'");
if ($sql == TRUE) {
echo "<script> alert ('Proses Hapus Gallery Berhasil');
window.location='gallery.php'; </script>";
} else {
echo "<script> alert ('Proses Hapus Gallery Gagal');
history.back(); </script>";
}
?>