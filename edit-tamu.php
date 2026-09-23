<?php
require_once('function.php');

// 1. ambil id_tamu dari URL dan query data tamunya
if (isset($_GET['id'])) {
    $id_tamu = $_GET['id'];
    $data = query("SELECT * FROM buku_tamu WHERE id_tamu = '$id_tamu'")[0];
}

// jika ada tombol simpan
if (isset($_POST['simpan'])) {
    if (ubah_tamu($_POST) > 0) {
?>
        <div class="alert alert-success" role="alert">
            Data berhasil diubah!
        </div>
<?php
    } else {
?>
        <div class="alert alert-danger" role="alert">
            Data gagal diubah!
        </div>
<?php
    }
}

include_once('templates/header.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Ubah Data Tamu</h1>

    <!-- Card Form Edit -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Ubah Data Tamu</h6>
        </div>
        <div class="card-body">
            <form method="post" action="" enctype="multipart/form-data">
                <input type="hidden" name="id_tamu" id="id_tamu" value="<?= $id_tamu ?>">
                <input type="hidden" name="gambarLama" id="gambarLama" value="<?= $data['gambar']; ?>"></input>
                
                <div class="form-group row">
                    <label for="nama_tamu" class="col-sm-3 col-form-label">Nama Tamu</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nama_tamu" name="nama_tamu" value="<?= $data['nama_tamu'] ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" id="alamat" name="alamat" required><?= $data['alamat'] ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_hp" class="col-sm-3 col-form-label">No. Telepon</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $data['no_hp'] ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="bertemu" class="col-sm-3 col-form-label">Bertemu dg.</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="bertemu" name="bertemu" value="<?= $data['bertemu'] ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kepentingan" class="col-sm-3 col-form-label">Kepentingan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="kepentingan" name="kepentingan" value="<?= $data['kepentingan'] ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="gambar" class="col-sm-3 col-form-label">Gambar Foto</label>
                        <div class="col-sm-8">
                            <img src="assets/upload_gambar/<?= $data['gambar']; ?>" alt="" width="30%">
                                <input type="file" name="gambar" class="form-control-file" id="gambar">
                         </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-8 d-flex justify-content-end">
                        <div>
                            <a class="btn btn-danger btn-icon-split" href="buku-tamu.php">
                                <span class="icon text-white-50">
                                    <i class="fas fa-chevron-left"></i>
                                </span>
                                <span class="text">Kembali</span>
                            </a>
                            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php
include_once('templates/footer.php');
?>