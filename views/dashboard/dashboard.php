<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../style.css">
    <title>UJIKOM</title>
</head>
<body>
    <section class="px-4">
        <div class="container-fluid">
            <div class="card mt-2">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Selamat datang,<?php session_start(); echo $_SESSION['username']?></h5>
                        <a href="" class="btn btn-danger rounded-5">Logout</a>
                    </div>
                    <div class="d-flex justify-content-center align-items-center gap-3 mt-3">
                        <a href="../warga/index.php" class="btn rounded-5 text-white fs-4" style="background-color: var(--primary); width:31.52rem; height:4.3rem; padding-top:1rem;">Data Warga</a>
                        <a href="../faskes/index.php" class="btn rounded-5 text-white fs-4" style="background-color: var(--primary); width:31.52rem; height:4.3rem; padding-top:1rem;">Data Faskes</a>
                        <a href="../kis/index.php" class="btn rounded-5 text-white fs-4" style="background-color: var(--primary); width:31.52rem; height:4.3rem; padding-top:1rem;">Data KIS</a>
                        <a href="../ubahpass/index.php" class="btn rounded-5 text-white fs-4" style="background-color: var(--primary); width:31.52rem; height:4.3rem; padding-top:1rem;">Ubah Password</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>