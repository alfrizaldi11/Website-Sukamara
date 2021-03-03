<?php 
session_start();
include '../config/koneksiadmin.php';

if (isset($_POST['update'])) { //apabila tombol simpan dijalankan maka update data dijalankan

     $id_gallery=$_POST['id_gallery'];
     $nama_album = $_POST['id_album'];
     $keterangan_foto = $_POST['keterangan_foto'];
     
     
     $lokasi_file    = $_FILES['foto_gallery']['tmp_name'];
     $nama_file      = $_FILES['foto_gallery']['name'];
     $tipe_foto      = $_FILES['foto_gallery']['type'];
     $direktori1 = "image/gallery/$nama_file";

 
if(empty($lokasi_file)){
   
     $update="UPDATE gallery set id_album='$nama_album', keterangan_foto='$keterangan_foto' WHERE id_gallery='$id_gallery'";
}
elseif (empty($keterangan_foto)) {
     echo "<script> alert('Masukkan Keterangan Foto'); window.location='gallery.php';</script>";
}

elseif (!empty($lokasi_file)){
	if ($tipe_foto != "image/png"){
     echo "<script>window.alert('Proses Ubah Gagal, foto Harus Format PNG');
       window.location='gallery.php'</script>";
	}else{
	move_uploaded_file($lokasi_file,'image/gallery/'.$nama_file);
	
		 $update="UPDATE gallery SET foto_gallery='$nama_file', id_album='$nama_album', keterangan_foto='$keterangan_foto' where id_gallery='$id_gallery'";
}}
 $cek = mysqli_query($connect,$update);
 
if($cek){ 
 echo "<script> alert('Data Gallery Berhasil Diubah');
  window.location = 'gallery.php'</script>";
 }else{ 
 echo "<script> alert ('Data Gallery Gagal Diubah');
window.location = 'gallery.php'</script>";
  }}
 
?>