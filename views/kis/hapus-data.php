<?php
include '../../koneksi.php';
$no = $_POST['no_kartu'];
$sql = mysqli_query($con,"delete from kis where no_kartu='$no'");
$cek =mysqli_affected_rows($con);

if($cek == true){
    header('location:index.php?pesan=berhasilhapus');
}else{
    header('location:index.php?pesan=gagal');
}