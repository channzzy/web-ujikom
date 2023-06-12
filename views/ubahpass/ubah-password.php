<?php
include '../../koneksi.php';
$username = $_POST['username'];
$pslama = $_POST['ps_lama'];
$psbaru = $_POST['ps_baru'];
$kfpass = $_POST['kf_pass'];

$checkPass = mysqli_query($con,"select * from user where username='$username' and password='$pslama'");
$cek = mysqli_num_rows($checkPass);

if($cek > 0){
    if($_POST['ps_baru'] != $_POST['kf_pass']){
        header('location:index.php?pesan=gagalkf');
    }else{
        $sql = mysqli_query($con,"update user set password='$psbaru' where username='$username'");
        header('location:index.php?pesan=berhasil');
    }
}else{
    header('location:index.php?pesan=gagal');
}