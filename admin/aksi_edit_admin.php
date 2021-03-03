<?php
error_reporting(0); 
include '../config/koneksiadmin.php';
  session_start();

 $id_admin = $_POST['id_admin'];
 $username_admin = $_POST['username'];
 $password_admin = $_POST['mypassword'];
 $email_admin = $_POST['email'];
 
if (empty($username)) {
     echo "<script> alert('Tidak ada username yang di masukkan'); window.location='kelola_admin.php';</script>";
}
		else {
			$update="UPDATE myadmin set username='$username_admin', mypassword='$password_admin', email='$email_admin' where id_admin='$id_admin'";
		
	}
$cek = mysqli_query($connect, $update);

if($cek){
    
 
	echo "<script> alert ('data admin berhasil di ubah');
	window.location = 'admin.php'</script>";
	} else {
		echo "<script> alert ('data admin gagal di ubah');
		window.location = 'admin.php'</script>";
}
?>
