<?php
include '../config/koneksi.php';
//bagian deklarasi 
$id = $_GET['id'];


$sql = mysqli_query($koneksi,"DELETE FROM album WHERE id_album='$id'");
if ($sql == TRUE) {
echo "<script> alert ('Proses Hapus Album Berhasil');
window.location='album.php'; </script>";
} else {
echo "<script> alert ('Proses Hapus Album Gagal');
history.back(); </script>";
}
?>