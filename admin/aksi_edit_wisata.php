<?php 
session_start();
include '../config/koneksiadmin.php';

if (isset($_POST['update'])) { //apabila tombol simpan dijalankan maka update data dijalankan

    $id_wisata    = $_POST['id_wisata'];
    $nama_wisata    = $_POST['nama_wisata'];
    $keterangan_wisata    = $_POST['keterangan_wisata'];
    $lokasi_wisata  = $_POST['lokasi_wisata'];
     
     $lokasi_file    = $_FILES['foto_wisata']['tmp_name'];
     $nama_file      = $_FILES['foto_wisata']['name'];
     $tipe_foto      = $_FILES['foto_wisata']['type'];
     $direktori1 = "image/wisata/$nama_file";

 
if(empty($lokasi_file)){
   
		$update="UPDATE wisata SET nama_wisata='$nama_wisata', keterangan_wisata='$keterangan_wisata', lokasi_wisata='$lokasi_wisata' where id_wisata='$id_wisata'";
}
elseif (empty($nama_wisata)) {
     echo "<script> alert('Masukkan Nama Wisata'); window.location='wisata.php';</script>";
}

elseif (!empty($lokasi_file)){
	if ($tipe_foto != "image/png"){
     echo "<script>window.alert('Proses Ubah Gagal, foto Harus Format PNG');
       window.location='wisata.php'</script>";
	}else{
	move_uploaded_file($lokasi_file,'image/wisata/'.$nama_file);
	
		 $update="UPDATE wisata SET foto_wisata='$nama_file', nama_wisata='$nama_wisata', keterangan_wisata='$keterangan_wisata', lokasi_wisata='$lokasi_wisata' where id_wisata='$id_wisata'";
}}
 $cek = mysqli_query($connect,$update);
 
if($cek){ 
 echo "<script> alert('Data Wisata Berhasil Diubah');
  window.location = 'wisata.php'</script>";
 }else{ 
 echo "<script> alert ('Data Wisata Gagal Diubah');
window.location = 'wisata.php'</script>";
  }}
 
?>