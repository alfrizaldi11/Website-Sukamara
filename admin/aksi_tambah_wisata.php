<?php 

include '../config/koneksiadmin.php';
  session_start();
 $nama_wisata    = $_POST['nama_wisata'];
 $keterangan_wisata    = $_POST['keterangan_wisata'];
 $lokasi_wisata  = $_POST['lokasi_wisata'];
  
  $lokasi_file    = $_FILES['foto_wisata']['tmp_name'];
  $nama_file      = $_FILES['foto_wisata']['name'];
  $tipe_foto      = $_FILES['foto_wisata']['type'];
  $direktori1 = "image/wisata/$nama_file";
  // Apabila ada gambar yang diupload

    
 $sql="SELECT * FROM wisata WHERE nama_wisata ='$nama_wisata'";
 $cek= mysqli_query($connect, $sql);
 if(mysqli_num_rows($cek) > 0){
	echo "<script>alert('Nama wisata $nama_wisata sudah terdaftar'); window.location='wisata.php';</script>";
	} else {
 if(empty($lokasi_file)){

			$query = "INSERT INTO wisata (nama_wisata, keterangan_wisata, lokasi_wisata)VALUES ('$nama_wisata', '$keterangan_wisata', '$lokasi_wisata')";
	}
	elseif (empty($nama_wisata)) {
     echo "<script> alert('Masukkan Nama Wisata'); window.location='wisata.php';</script>";
}
			
	 elseif(!empty($lokasi_file)){
	 if($tipe_foto != 'image/png'){
			echo "<script>alert('Proses Tambah Gagal, cover Harus Format PNG'); window.location='wisata.php';</script>";
		} else {
 move_uploaded_file($lokasi_file,'image/wisata/'.$nama_file);
 $query = "INSERT INTO wisata (foto_wisata, nama_wisata, keterangan_wisata, lokasi_wisata)VALUES ('$nama_file', '$nama_wisata', '$keterangan_wisata', '$nama_wisata')";
		}
	 }		
 $hasil = mysqli_query($connect, $query); 
 
 if($hasil){ 
  echo "<script> alert('Data Wisata berhasil disimpan');
  window.location = 'wisata.php'</script>";
 }else{ 
 echo "<script> alert ('Data Wisata Gagal disimpan');
window.location = 'wisata.php'</script>";
 }}
 
 ?>  