<?php
include '../../koneksi.php';
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jk = $_POST['jk'];
$tgl = $_POST['tgl'];
$sql = mysqli_query($con,"update warga set nama_warga='$nama',alamat='$alamat',jenis_kelamin='$jk',tanggal_lahir='$tgl' where nik='$nik'");
$cek =mysqli_affected_rows($con);

if($cek == true){
    header('location:index.php?pesan=berhasilupdate');
}else{
    header('location:index.php?pesan=gagal');
}