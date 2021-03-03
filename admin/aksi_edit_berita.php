<?php 
session_start();
include '../config/koneksiadmin.php';
//error_reporting(0);
if (isset($_POST['update'])) { //apabila tombol simpan dijalankan maka update data dijalankan

$id_berita=$_POST['id_berita'];
$judul_berita = $_POST['judul_berita'];
$tanggal_berita = $_POST['tanggal_berita'];
$spoiler_berita = $_POST['spoiler_berita'];
$tanggal_posting = $_POST['tanggal_posting'];
$isi_berita = $_POST['isi_berita'];

 $lokasi_file    = $_FILES['foto_berita']['tmp_name'];
 $nama_file      = $_FILES['foto_berita']['name'];
 $tipe_foto      = $_FILES['foto_berita']['type'];
 
if(empty($lokasi_file)){
		$update="UPDATE berita set judul_berita ='$judul_berita' WHERE id_berita='$id_berita'";
}
elseif (empty($judul_berita)) {
     echo "<script> alert('Masukkan Nama berita'); window.location='berita.php';</script>";
}

elseif (!empty($lokasi_file)){
	if ($tipe_foto != "image/png"){
     echo "<script>window.alert('Proses Ubah Gagal, Foto Harus Format PNG');
       window.location='berita.php'</script>";
	}else{
	move_uploaded_file($lokasi_file,'image/berita/'.$nama_file);
	
		 $update="UPDATE berita set judul_berita='$judul_berita', tanggal_berita='$tanggal_berita', spoiler_berita='$spoiler_berita', isi_berita='$isi_berita', tanggal_posting='$tanggal_posting', foto_berita='$nama_file' where id_berita='$id_berita'";
}}
 $cek = mysqli_query($connect,$update);
 
if($cek){ 
 echo "<script> alert('Data berita Berhasil Diubah');
  window.location = 'berita.php'</script>";
 }else{ 
 echo "<script> alert ('Data berita Gagal Diubah');
window.location = 'berita.php'</script>";
  }}
 
?>
