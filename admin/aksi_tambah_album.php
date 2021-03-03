<?php 

include '../config/koneksiadmin.php';
  session_start();

  $nama_album = $_POST['nama_album'];

  $lokasi_file    = $_FILES['foto_album']['tmp_name'];
  $nama_file      = $_FILES['foto_album']['name'];
  $tipe_foto      = $_FILES['foto_album']['type'];
  $direktori1 = "image/album/$nama_file";
  // Apabila ada gambar yang diupload

    
 $sql="SELECT * FROM album WHERE nama_album ='$nama_album'";
 $cek= mysqli_query($connect, $sql);
 if(mysqli_num_rows($cek) > 0){
	echo "<script>alert('Nama Album $nama_album sudah terdaftar'); window.location='album.php';</script>";
	} else {
 if(empty($lokasi_file)){

			$query = "INSERT INTO album ( nama_album)VALUES ('$nama_album')";
	}
	elseif (empty($nama_album)) {
     echo "<script> alert('Masukkan Nama Album'); window.location='album.php';</script>";
}
			
	 elseif(!empty($lokasi_file)){
	 if($tipe_foto != 'image/png'){
			echo "<script>alert('Proses Tambah Gagal, cover Harus Format PNG'); window.location='album.php';</script>";
		} else {
 move_uploaded_file($lokasi_file,'image/album/'.$nama_file);
 $query = "INSERT INTO album (foto_album, nama_album) VALUES ('$nama_file', '$nama_album')";
		}
	 }		
 $hasil = mysqli_query($connect, $query); 
 
 if($hasil){ 
  echo "<script> alert('Data Album berhasil disimpan');
  window.location = 'album.php'</script>";
 }else{ 
 echo "<script> alert ('Data Album Gagal disimpan');
window.location = 'album.php'</script>";
 }}
 
 ?>  