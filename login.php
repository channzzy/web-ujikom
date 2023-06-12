<?php
include 'koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];

$sql = mysqli_query($con,"select * from user where username='$username' and password='$password'");
$cek = mysqli_num_rows($sql);
$data = mysqli_fetch_assoc($sql);
if($cek > 0){
    session_start();
    $_SESSION['username'] = $data['username'];
    header('location:views/dashboard/dashboard.php');
}else{
    header('location:page-login.php?pesan=gagal');
}