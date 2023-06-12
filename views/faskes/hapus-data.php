<?php
include '../../koneksi.php';
$id = $_POST['id_faskes'];
$sql = mysqli_query($con,"delete from faskes where id_faskes='$id'");
$cek =mysqli_affected_rows($con);

if($cek == true){
    header('location:index.php?pesan=berhasilhapus');
}else{
    header('location:index.php?pesan=gagal');
}