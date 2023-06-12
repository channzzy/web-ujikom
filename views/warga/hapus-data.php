<?php
include '../../koneksi.php';
$nik = $_POST['nik'];
$sql = mysqli_query($con,"delete from warga where nik='$nik'");
$cek =mysqli_affected_rows($con);

if($cek == true){
    header('location:index.php?pesan=berhasilhapus');
}else{
    header('location:index.php?pesan=gagal');
}