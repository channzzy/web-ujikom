<?php
include '../../koneksi.php';
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jk = $_POST['jk'];
$tgl = $_POST['tgl'];
$sql = mysqli_query($con,"insert into warga values('$nik','$nama','$alamat','$jk','$tgl')");
$cek =mysqli_affected_rows($con);

if($cek == true){
    header('location:index.php?pesan=berhasiltambah');
}else{
    header('location:index.php?pesan=gagal');
}