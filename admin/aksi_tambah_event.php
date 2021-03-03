<?php 

include '../config/koneksiadmin.php';
  session_start();

  $judul_event = $_POST['judul_event'];
  $keterangan_event = $_POST['keterangan_event'];
  $tanggal_event = $_POST['tanggal_event'];
  $lokasi_event = $_POST['lokasi_event'];

  $lokasi_file    = $_FILES['foto_event']['tmp_name'];
  $nama_file      = $_FILES['foto_event']['name'];
  $tipe_foto      = $_FILES['foto_event']['type'];
  $direktori1 = "image/event/$nama_file";
  // Apabila ada gambar yang diupload

    
 $sql="SELECT * FROM event WHERE judul_event ='$judul_event'";
 $cek= mysqli_query($connect, $sql);
 if(mysqli_num_rows($cek) > 0){
	echo "<script>alert('Judul Event $judul_event sudah terdaftar'); window.location='event.php';</script>";
	} else {
 if(empty($lokasi_file)){

			$query = "INSERT INTO event ( judul_event) VALUES ('$judul_event')";
	}
	elseif (empty($judul_event)) {
     echo "<script> alert('Masukkan Judul Event '); window.location='event.php';</script>";
}
			
	 elseif(!empty($lokasi_file)){
	 if($tipe_foto != 'image/png'){
			echo "<script>alert('Proses Tambah Gagal, cover Harus Format PNG'); window.location='event.php';</script>";
		} else {
 move_uploaded_file($lokasi_file,'image/event/'.$nama_file);
 $query = "INSERT INTO event (judul_event, keterangan_event, tanggal_event, lokasi_event, foto_event) VALUES ('$judul_event', '$keterangan_event', '$tanggal_event', '$lokasi_event', '$nama_file')";
		}
	 }		
 $hasil = mysqli_query($connect, $query); 
 
 if($hasil){ 
  echo "<script> alert('Data Event berhasil disimpan');
  window.location = 'event.php'</script>";
 }else{ 
 echo "<script> alert ('Data Event Gagal disimpan');
window.location = 'event.php'</script>";
 }}
 
 ?>  