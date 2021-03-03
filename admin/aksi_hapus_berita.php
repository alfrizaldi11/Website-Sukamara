<?php
include '../config/koneksi.php';
//bagian deklarasi 
$id = $_GET['id'];


$sql = mysqli_query($koneksi,"DELETE FROM berita WHERE id_berita='$id'");
if ($sql == TRUE) {
echo "<script> alert ('Proses Hapus Berita Berhasil');
window.location='berita.php'; </script>";
} else {
echo "<script> alert ('Proses Hapus Berita Gagal');
history.back(); </script>";
}
?>