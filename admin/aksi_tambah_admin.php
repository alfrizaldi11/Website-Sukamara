<?php 

include '../config/koneksi.php';
//error_reporting(0);

$username = $_POST ['username'];
$mypassword = $_POST ['mypassword'];
$email = $_POST ['email'];
$lvl = $_POST ['level'];



 $cekreg=mysqli_query($koneksi,"SELECT * from myadmin where username ='$username'");
 if(mysqli_num_rows($cekreg) > 0){
	echo "<script>alert('email $username sudah terdaftar'); 
	window.location='admin.php';</script>";
	} else {
 
$query = mysqli_query($koneksi,"INSERT INTO myadmin (username,mypassword,email,level)
					VALUES ('$username','$mypassword','$email','$lvl')");
	}
 if($query){ 
  echo "<script> alert('Data Admin berhasil disimpan');
  window.location = 'admin.php'</script>";
 }else{ 
 echo "<script> alert ('Data Unit Gagal disimpan');
window.location = 'admin.php'</script>";
 }
 ?>  