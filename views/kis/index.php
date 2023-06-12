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
                <div class="container-fluid d-flex justify-content-between align-content-center mb-3">
                    <h5>Tambah Data KIS</h5>
                    <a href="../dashboard/dashboard.php" class="btn btn-danger text-white rounded-5">Kembali</a>
                </div>
                <form action="tambah-data.php" method="post">
                    <?php
                    include '../../koneksi.php';
                    $findKis = mysqli_query($con,"select max(no_kartu) as no from kis");
                    $dataKis = mysqli_fetch_assoc($findKis);
                    $no_kartu = $dataKis['no'];

                    $format="2023";
                    $urutan = (int) substr($no_kartu,7,7);
                    $urutan ++;
                    $noKartu = $format . sprintf("%06s",$urutan);
                    ?>
                    <input type="text" name="no" id="" class="form-control mb-3" placeholder="Masukan ID" style="width:25rem;" value="<?= $noKartu?>">
                    <select name="faskes" id="" class="form-control mb-3" style="width: 25rem;">
                        <?php
                        $findFaskes = mysqli_query($con,"select * from faskes");
                        $faskes = mysqli_fetch_assoc($findFaskes);
                        ?>
                        <option value="<?= $faskes['id_faskes']?>"><?= $faskes['nama_faskes']?></option>
                    </select>
                    <select name="nik" id="" class="form-control mb-3" style="width: 25rem;">
                        <?php
                        $findWarga = mysqli_query($con,"select * from warga");
                        $warga = mysqli_fetch_assoc($findWarga);
                        ?>
                        <option value="<?= $warga['nik']?>"><?= $warga['nama_warga']?></option>
                    </select>
                    <button type="submit" class="btn rounded-5 text-white" style="background-color: var(--primary);">Tambah Data</button>
                </form>
            </div>
        </div>
        <div class="card mt-3 py-3">
            <div class="card-body">
                <div class="bg-success rounded-2">
                    <?php
                    if(isset($_GET['pesan'])){
                        if($_GET['pesan'] == 'berhasiltambah'){
                            echo "<div class='alert text-white ms-2'>Data berhasil ditambahkan</div>";                        
                        }
                        else if($_GET['pesan'] == 'berhasilupdate'){
                            echo "<div class='alert text-white ms-2'>Data berhasil diedit</div>";                        
                        }
                        else if($_GET['pesan'] == 'berhasilhapus'){
                            echo "<div class='alert text-white ms-2'>Data berhasil dihapus</div>";                        
                        }
                    }
                    ?>
                </div>
                <table id="data" class="table table-hover print">
                    <thead>
                        <th>No Kartu</th>
                        <th>NIK</th>
                        <th>Nama Warga</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Tingkat</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody class="print">
                        <?php
                        include '../../koneksi.php';
                        $no = 1;
                        $sql = mysqli_query($con,"SELECT kis.no_kartu,warga.nik,warga.nama_warga,warga.alamat,warga.jenis_kelamin,warga.tanggal_lahir,faskes.nama_faskes FROM kis INNER JOIN faskes on kis.id_faskes = faskes.id_faskes INNER JOIN warga on kis.nik = warga.nik;");
                        while($data = mysqli_fetch_assoc($sql)){

                            ?>
                            <tr>
                                <td><?= $data['no_kartu']?></td>
                                <td><?= $data['nik']?></td>
                                <td><?= $data['nama_warga']?></td>
                                <td><?= $data['alamat']?></td>
                                <td><?= $data['jenis_kelamin']?></td>
                                <td><?= $data['tanggal_lahir']?></td>
                                <td><?= $data['nama_faskes']?></td>
                                <td>
                                    <div class="d-flex gap-2 align-items-center">
                                        <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?= $data['no_kartu']?>">Cetak</a>
                                        <a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?= $data['no_kartu']?>">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                            <section id="modal">
                            <div class="modal fade" id="edit<?= $data['no_kartu'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                            <form action="" method="post">
                                                <h5 class="text-center">Kartu Indonesia Sehat</h5>
                                                <?php
                                                echo "Nomor Kartu: ". $data['no_kartu']."<br>";
                                                echo "Nama Warga: ". $data['nama_warga']."<br>";
                                                echo "Alamat: ". $data['alamat']."<br>";
                                                echo "Jenis Kelamin: ". $data['jenis_kelamin']."<br>";
                                                echo "Tanggal Lahir: ". $data['tanggal_lahir']."<br>";
                                                echo "NIK: ". $data['nik']."<br>";
                                                echo "Faskes Tingkat: ". $data['nama_faskes']."<br>";
                                                ?>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary print" data-bs-dismiss="modal">Close</button>
                                            <button onclick="window.print()" class="btn btn-primary print">Print</button>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                            <div class="modal fade" id="hapus<?= $data['no_kartu'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                            <form action="hapus-data.php" method="post">
                                                <input type="number" required readonly value="<?= $data['no_kartu'] ?>" class="form-control mb-3" name="no_kartu" hidden>
                                                <h6>Apakah Anda Yakin Ingin Menghapus Data "<?=$data['no_kartu']?>"</h6>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Hapus</button>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                            </section>
                            <?php } ?>
                        </tbody>
                    </table>
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