<?php 
// mengaktifkan session pada php
session_start();
// menghubungkan php dengan koneksi database
include "config/koneksilogin.php";

 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$pass = $_POST['mypassword'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"SELECT * FROM myadmin where username='$username' and mypassword='$pass'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){
 
  $data = mysqli_fetch_assoc($login);
  // cek jika user login sebagai admin
  if($data['level']=="admin_master"){
    // buat session login dan username
    $_SESSION['username'] = $username;
    $_SESSION['level'] = "admin_master";
    // alihkan ke halaman dashboard admin
    header("location:admin/index.php");

  }else if($data['level']=="admin"){
    // buat session login dan username
    $_SESSION['username'] = $username;
    $_SESSION['level'] = "admin";
    header("location:admin/index.php");
 
 
  }else{
    // alihkan ke halaman login kembali
    echo "<script> alert('Username atau Password anda salah');
    window.location = 'login.php'</script>";
  } 
}else{ 
    echo "<script> alert('Username atau Password anda salah');
    window.location = 'login.php'</script>";
}


?>


