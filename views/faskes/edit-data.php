<?php
include '../../koneksi.php';
$id = $_POST['id_faskes'];
$nama = $_POST['nama'];
$sql = mysqli_query($con,"update faskes set nama_faskes='$nama' where id_faskes='$id'");
$cek =mysqli_affected_rows($con);

if($cek == true){
    header('location:index.php?pesan=berhasilupdate');
}else{
    header('location:index.php?pesan=gagal');
}