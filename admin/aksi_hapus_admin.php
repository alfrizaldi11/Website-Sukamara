<?php
include '../config/koneksi.php';
//bagian deklarasi 
$id = $_GET['id'];


$sql = mysqli_query($koneksi,"DELETE FROM myadmin WHERE id_admin='$id'");
if ($sql == TRUE) {
echo "<script> alert ('Proses Hapus Admin Berhasil');
window.location='admin.php'; </script>";
} else {
echo "<script> alert ('Proses Hapus Admin Gagal');
history.back(); </script>";
}
?>