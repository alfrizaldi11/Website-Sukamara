<?php 
session_start();
include '../config/koneksiadmin.php';
//error_reporting(0);
if (isset($_POST['update'])) { //apabila tombol simpan dijalankan maka update data dijalankan

$id_event=$_POST['id_event'];
$judul_event = $_POST['judul_event'];
$keterangan_event = $_POST['keterangan_event'];
$tanggal_event = $_POST['tanggal_event'];
$lokasi_event = $_POST['lokasi_event'];

 $lokasi_file    = $_FILES['foto_event']['tmp_name'];
 $nama_file      = $_FILES['foto_event']['name'];
 $tipe_foto      = $_FILES['foto_event']['type'];
 
if(empty($lokasi_file)){
		$update="UPDATE event set judul_event='$judul_event' where id_event='$id_event'";
}
elseif (empty($judul_event)) {
     echo "<script> alert('Masukkan Judul Event'); window.location='event.php';</script>";
}

elseif (!empty($lokasi_file)){
	if ($tipe_foto != "image/png"){
     echo "<script>window.alert('Proses Ubah Gagal, Foto Harus Format PNG');
       window.location='event.php'</script>";
	}else{
	move_uploaded_file($lokasi_file,'image/event/'.$nama_file);
	
    $update="UPDATE event set judul_event='$judul_event', keterangan_event='$keterangan_event', tanggal_event='$tanggal_event', lokasi_event='$lokasi_event', foto_event='$nama_file' where id_event='$id_event'";
}}

 $cek = mysqli_query($connect,$update);
 
if($cek){ 
 echo "<script> alert('Data Event Berhasil Diubah');
  window.location = 'event.php'</script>";
 }else{ 
 echo "<script> alert ('Data Event Gagal Diubah');
window.location = 'event.php'</script>";
  }}
 
?>
