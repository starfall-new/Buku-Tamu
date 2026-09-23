<?php
include_once('templates/header.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Laporan Histori Tamu</h1>

    <!-- Form Filter Periode -->
    <div class="row mx-auto d-flex justify-content-center">
        <div class="col-xl-8 col-md-10 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body py-2">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <form method="post" action="">
                                <div class="form-row align-items-center">
                                    <div class="col-auto">
                                        <div class="font-weight-bold text-primary text-uppercase mr-2">
                                            PERIODE
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <input type="date" class="form-control form-control-sm" id="p_awal" name="p_awal" required>
                                    </div>
                                    <div class="col-auto">
                                        <div class="font-weight-bold text-primary mx-2">
                                            s.d
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <input type="date" class="form-control form-control-sm" id="p_akhir" name="p_akhir" required>
                                    </div>
                                    <div class="col-auto ml-2">
                                        <button type="submit" name="tampilkan" class="btn btn-primary btn-sm">Tampilkan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Histori Tamu ditaruh di bawah sini -->

</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <span class="text">Tabel Histori Tamu</span>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Tamu</th>
                        <th>Alamat</th>
                        <th>No. Telp/HP</th>
                        <th>Bertemu Dengan</th>
                        <th>Kepentingan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
    if (isset($_POST['tampilkan'])) {
        $p_awal = $_POST['p_awal'];
        $p_akhir = $_POST['p_akhir'];
        // penomoran auto-increment
        $no = 1;
        // Query untuk memanggil semua data dari tabel buku_tamu
        $buku_tamu = query("SELECT * FROM buku_tamu WHERE tanggal BETWEEN '$p_awal' AND '$p_akhir' ");
        foreach ($buku_tamu as $tamu) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $tamu['tanggal'] ?></td>
                <td><?= $tamu['nama_tamu'] ?></td>
                <td><?= $tamu['alamat'] ?></td>
                <td><?= $tamu['no_hp'] ?></td>
                <td><?= $tamu['bertemu'] ?></td>
                <td><?= $tamu['kepentingan'] ?></td>
                <td>
                    <a class="btn btn-success" href="edit-tamu.php?id=<?= $tamu['id_tamu'] ?>">Ubah</a>
                    <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger" href="hapus-tamu.php?id=<?= $tamu['id_tamu'] ?>">Hapus</a>
                </td>
            </tr>
                <?php endforeach;
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
```[cite: 25]

<?php
include_once('templates/footer.php')
?>