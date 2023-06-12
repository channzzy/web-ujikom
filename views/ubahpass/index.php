<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/datatable/datatables.min.css">
    <link rel="stylesheet" href="../../style.css">
    <title>Data Warga</title>
    <style>
        @media print{
            .print{
                display: none;
            }
        }
    </style>
</head>
<body>
    <section class="px-4">
        <div class="card mt-2">
            <div class="card-body">
            <div class="bg-success rounded-2">
                    <?php
                    if(isset($_GET['pesan'])){
                        if($_GET['pesan'] == 'berhasil'){
                            echo "<div class='alert text-white ms-2'>Password Berhasil Diubah</div>";                        
                        }
                    }
                    ?>
            </div>
            <div class="bg-danger rounded-2">
                    <?php
                    if(isset($_GET['pesan'])){
                        if($_GET['pesan'] == 'gagalkf'){
                            echo "<div class='alert text-white ms-2'>Password Tidak Sesuai</div>";                        
                        }else if($_GET['pesan'] == 'gagal'){
                            echo "<div class='alert text-white ms-2'>Password Lama Salah</div>";                        
                        }
                    }
                    ?>
            </div>
                <div class="container-fluid d-flex justify-content-between align-content-center mb-3">
                    <h5>Silahkan Ubah Password Anda</h5>
                    <a href="../dashboard/dashboard.php" class="btn btn-danger text-white rounded-5">Kembali</a>
                </div>
                <form action="ubah-password.php" method="post">
                <input type="text" hidden name="username" id="" class="form-control mb-3" placeholder="Masukan Password Lama" value="<?php session_start(); echo$_SESSION['username']?>">
                <input type="text" name="ps_lama" id="" class="form-control mb-3" placeholder="Masukan Password Lama">
                    <input type="text" name="ps_baru" id="" class="form-control mb-3" placeholder="Masukan Password Baru">
                    <input type="text" name="kf_pass" id="" class="form-control mb-3" placeholder="Konfirmasi Password">
                    <button type="submit" class="btn rounded-5 text-white" style="background-color: var(--primary);">Ubah Password</button>
                </form>
            </div>
        </div>
    </section>
</body>
<script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../../assets/datatable/datatables.min.js"></script>
<script>
    let table = new DataTable('#data');
</script>
</html>