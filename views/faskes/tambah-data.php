<?php
include '../../koneksi.php';
$nama = $_POST['nama'];
$sql = mysqli_query($con,"insert into faskes values('','$nama')");
$cek =mysqli_affected_rows($con);

if($cek == true){
    header('location:index.php?pesan=berhasiltambah');
}else{
    header('location:index.php?pesan=gagal');
}