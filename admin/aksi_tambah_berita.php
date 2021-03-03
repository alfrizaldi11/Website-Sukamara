<?php 

include '../config/koneksiadmin.php';
  session_start();

  $judul_berita = $_POST['judul_berita'];
  $tanggal_berita = $_POST['tanggal_berita'];
  $spoiler_berita = $_POST['spoiler_berita'];
  $tanggal_ppsting = $_POST['tanggal_posting'];
  $isi_berita = $_POST['isi_berita'];

  $lokasi_file    = $_FILES['foto_berita']['tmp_name'];
  $nama_file      = $_FILES['foto_berita']['name'];
  $tipe_foto      = $_FILES['foto_berita']['type'];
  $direktori1 = "image/berita/$nama_file";
  // Apabila ada gambar yang diupload

    
 $sql="SELECT * FROM berita WHERE judul_berita ='$judul_berita'";
 $cek= mysqli_query($connect, $sql);
 if(mysqli_num_rows($cek) > 0){
	echo "<script>alert('Nama berita $judul_berita sudah terdaftar'); window.location='berita.php';</script>";
	} else {
 if(empty($lokasi_file)){

			$query = "INSERT INTO berita (judul_berita, tanggal_berita, isi_berita, tanggal_posting) VALUES ('$judul_berita', '$tanggal_berita', '$isi_berita', '$tanggal_posting')";
	}
	elseif (empty($judul_berita)) {
     echo "<script> alert('Masukkan Judul Berita'); window.location='berita.php';</script>";
}
			
	 elseif(!empty($lokasi_file)){
	 if($tipe_foto != 'image/png'){
			echo "<script>alert('Proses Tambah Gagal, Foto Berita Harus Format PNG'); window.location='berita.php';</script>";
		} else {
 move_uploaded_file($lokasi_file,'image/berita/'.$nama_file);
 $query = "INSERT INTO berita (judul_berita, tanggal_berita, spoiler_berita, isi_berita, tanggal_posting, foto_berita) VALUES ('$judul_berita', '$tanggal_berita', '$spoiler_berita', '$isi_berita', '$tanggal_posting', '$nama_file')";
		}
	 }		
 $hasil = mysqli_query($connect, $query); 
 
 if($hasil){ 
  echo "<script> alert('Data berita berhasil disimpan');
  window.location = 'berita.php'</script>";
 }else{ 
 echo "<script> alert ('Data berita Gagal disimpan');
window.location = 'berita.php'</script>";
 }}
 
 ?>  