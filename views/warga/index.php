<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/datatable/datatables.min.css">
    <link rel="stylesheet" href="../../style.css">
    <title>Data Warga</title>
</head>
<body>
    <section class="px-4">
        <div class="card mt-2">
            <div class="card-body">
                <div class="container-fluid d-flex justify-content-between align-content-center mb-3">
                    <h5>Tambah Data Warga</h5>
                    <a href="../dashboard/dashboard.php" class="btn btn-danger text-white rounded-5">Kembali</a>
                </div>
                <form action="tambah-data.php" method="post">
                    <input type="number" name="nik" id="" class="form-control mb-3" placeholder="Masukan NIK" style="width:25rem;">
                    <input type="text" name="nama" id="" class="form-control mb-3" placeholder="Masukan Nama" style="width:25rem;">
                    <input type="text" name="alamat" id="" class="form-control mb-3" placeholder="Masukan Alamat" style="width:25rem;">
                    <select name="jk" id="" class="form-control mb-3" style="width: 25rem;">
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    <input type="date" name="tgl" id="" class="form-control mb-3" style="width:25rem;">
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
                <table id="data" class="table table-hover">
                    <thead>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>Tgl Lahir</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php
                        include '../../koneksi.php';
                        $no = 1;
                        $sql = mysqli_query($con,"select * from warga");
                        while($data = mysqli_fetch_assoc($sql)){

                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['nik']?></td>
                                <td><?= $data['nama_warga']?></td>
                                <td><?= $data['alamat']?></td>
                                <td><?= $data['jenis_kelamin']?></td>
                                <td><?= $data['tanggal_lahir']?></td>
                                <td>
                                    <div class="d-flex gap-2 align-items-center">
                                        <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?= $data['nik']?>">Edit</a>
                                        <a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?= $data['nik']?>">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                            <section id="modal">
                            <div class="modal fade" id="edit<?= $data['nik'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                            <form action="edit-data.php" method="post">
                                                <input type="number" required readonly value="<?= $data['nik'] ?>" class="form-control mb-3" name="nik">
                                                <input type="text" required value="<?= $data['nama_warga'] ?>" class="form-control mb-3" name="nama">
                                                <input type="text" required value="<?= $data['alamat'] ?>" class="form-control mb-3" name="alamat">
                                                <select name="jk" style="width: 100%;" id="" class="form-select mb-3">
                                                    <?php
                                                    if($data['jenis_kelamin'] == "Laki-Laki"){
                                                        echo "<option>Laki-laki</option>";
                                                        echo "<option>Perempuan</option>";
                                                    }else{
                                                        echo "<option>Perempuan</option>";
                                                        echo "<option>Laki-laki</option>";
                                                    }
                                                    ?>
                                                </select>
                                                <input type="date" required value="<?= $data['tanggal_lahir'] ?>" class="form-control mb-3" name="tgl_lahir">
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                            <div class="modal fade" id="hapus<?= $data['nik'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                            <form action="hapus-data.php" method="post">
                                                <input type="number" required readonly value="<?= $data['nik'] ?>" class="form-control mb-3" name="nik" hidden>
                                                <h6>Apakah Anda Yakin Ingin Menghapus Data "<?=$data['nik']?>"</h6>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
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