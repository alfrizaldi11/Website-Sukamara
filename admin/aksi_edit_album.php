<?php 
session_start();
include '../config/koneksiadmin.php';
//error_reporting(0);
if (isset($_POST['update'])) { //apabila tombol simpan dijalankan maka update data dijalankan

$id_album=$_POST['id_album'];
$nama_album = $_POST['nama_album'];

 $lokasi_file    = $_FILES['foto_album']['tmp_name'];
 $nama_file      = $_FILES['foto_album']['name'];
 $tipe_foto      = $_FILES['foto_album']['type'];
 
if(empty($lokasi_file)){
		$update="UPDATE album set nama_album='$nama_album' where id_album='$id_album'";
}
elseif (empty($nama_album)) {
     echo "<script> alert('Masukkan Nama Album'); window.location='album.php';</script>";
}

elseif (!empty($lokasi_file)){
	if ($tipe_foto != "image/png"){
     echo "<script>window.alert('Proses Ubah Gagal, Foto Harus Format PNG');
       window.location='album.php'</script>";
	}else{
	move_uploaded_file($lokasi_file,'image/album/'.$nama_file);
	
		 $update="UPDATE album set nama_album='$nama_album', foto_album='$nama_file' where id_album='$id_album'";
}}
 $cek = mysqli_query($connect,$update);
 
if($cek){ 
 echo "<script> alert('Data Album Berhasil Diubah');
  window.location = 'album.php'</script>";
 }else{ 
 echo "<script> alert ('Data Album Gagal Diubah');
window.location = 'album.php'</script>";
  }}
 
?>
