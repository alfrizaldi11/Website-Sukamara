<?php
include '../config/koneksi.php';
//bagian deklarasi 
$id = $_GET['id'];


$sql = mysqli_query($koneksi,"DELETE FROM event WHERE id_event='$id'");
if ($sql == TRUE) {
echo "<script> alert ('Proses Hapus Event Berhasil');
window.location='event.php'; </script>";
} else {
echo "<script> alert ('Proses Hapus Event Gagal');
history.back(); </script>";
}
?>