<?php 
include '../config/koneksiadmin.php';
  session_start();

 $isi_sejarah = ltrim($_POST['isi_sejarah']);
  
 
if (empty($isi_sejarah)) {
     echo "<script> alert('Tidak ada sejarah yang di masukkan'); window.location='sejarah.php';</script>";
}
		else {
			$update="UPDATE sejarah set isi_sejarah='$isi_sejarah'";
		
	}
$cek = mysqli_query($connect, $update);

if($cek){
    
 
	echo "<script> alert ('Sejarah  berhasil di ubah');
	window.location = 'sejarah.php'</script>";
	} else {
		echo "<script> alert ('Sejarah gagal di ubah');
		window.location = 'sejarah.php'</script>";
}
?>