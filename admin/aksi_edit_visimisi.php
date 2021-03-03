<?php 
include '../config/koneksiadmin.php';
  session_start();

 $isi_visimisi = ltrim($_POST['isi_visimisi']);
  
 
if (empty($isi_visimisi)) {
     echo "<script> alert('Tidak ada visi & misi yang di masukkan'); window.location='visi_misi.php';</script>";
}
		else {
			$update="UPDATE visi_misi set isi_visimisi='$isi_visimisi'";
		
	}
$cek = mysqli_query($connect, $update);

if($cek){
    
 
	echo "<script> alert ('Visi & Misi  berhasil di ubah');
	window.location = 'visi_misi.php'</script>";
	} else {
		echo "<script> alert ('Visi & Misi gagal di ubah');
		window.location = 'visi_misi.php'</script>";
}
?>