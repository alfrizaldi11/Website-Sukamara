<?php 

include '../config/koneksiadmin.php';
  session_start();

  $nama_album = $_POST['id_album'];
  $keterangan_foto  = $_POST['keterangan_foto'];

  
  $lokasi_file    = $_FILES['foto_gallery']['tmp_name'];
  $nama_file      = $_FILES['foto_gallery']['name'];
  $tipe_foto      = $_FILES['foto_gallery']['type'];
  $direktori1 = "image/gallery/$nama_file";
  // Apabila ada gambar yang diupload

    
 $sql="SELECT * FROM gallery WHERE keterangan_foto='$keterangan_foto'";
 $cek= mysqli_query($connect, $sql);
 if(mysqli_num_rows($cek) > 0){
	echo "<script>alert('Keterangan Foto $keterangan_foto sudah terdaftar'); window.location='gallery.php';</script>";
	} else {
 if(empty($lokasi_file)){

			$query = "INSERT INTO gallery (id_album, keterangan_foto)VALUES ('$nama_album', '$keterangan_foto')";
	}
	elseif (empty($keterangan_foto)) {
     echo "<script> alert('Masukkan keterangan Foto'); window.location='gallery.php';</script>";
}
			
	 elseif(!empty($lokasi_file)){
	 if($tipe_foto != 'image/png'){
			echo "<script>alert('Proses Tambah Gagal, cover Harus Format PNG'); window.location='gallery.php';</script>";
		} else {
 move_uploaded_file($lokasi_file,'image/gallery/'.$nama_file);
 $query = "INSERT INTO gallery (foto_gallery, keterangan_foto, id_album) VALUES ('$nama_file', '$keterangan_foto','$nama_album')";
		}
	 }		
 $hasil = mysqli_query($connect, $query); 
 
 if($hasil){ 
  echo "<script> alert('Data Wisata berhasil disimpan');
  window.location = 'gallery.php'</script>";
 }else{ 
 echo "<script> alert ('Data Wisata Gagal disimpan');
window.location = 'gallery.php'</script>";
 }}
 
 ?>  