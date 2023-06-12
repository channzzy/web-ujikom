<?php
include '../../koneksi.php';
$no = $_POST['no'];
$idfaskes = $_POST['faskes'];
$nik = $_POST['nik'];

$sql = mysqli_query($con,"insert into kis values('$no','$idfaskes','$nik')");
$cek =mysqli_affected_rows($con);
if($cek == true){
    header('location:index.php?pesan=berhasiltambah');
}else{
    header('location:index.php?pesan=gagal');
}