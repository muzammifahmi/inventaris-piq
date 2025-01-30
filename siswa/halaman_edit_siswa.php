<?php

if (isset($_GET['id_siswa'])) {
    require_once "koneksi.php";
    require_once "utils.php";

    $sql = "SELECT * FROM tabel_siswa WHERE id_siswa=" . $_GET['id_siswa'];
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();
} else {
    echo "<script>window.location.href='index.php?page=siswa&item=tampil_siswa';</script>";
}

if (isset($_POST['submit'])) {
    $nama_siswa = $_POST['nama_siswa'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $tahun_masuk = $_POST['tahun_masuk'];
    $alamat_siswa = $_POST['alamat_siswa'];
    $foto_siswa = $row['foto_siswa'];
    
    if (isset($_FILES['dokumen_siswa']) && $_FILES['dokumen_siswa']['error'] == 0) {
        $target_dir = "siswa/uploads/";
        $file_name = date("YmdHis_") . basename($_FILES["dokumen_siswa"]["name"]);
        $target_file = $target_dir . $file_name;
        $uploadOk = 1;
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $sizeOk = checkFileSize($_FILES["dokumen_siswa"]["size"], 5000000);
        $typeOk = allowedFileType($file_type, ['jpg', 'png', 'jpeg']);

        if ($sizeOk != 0 && $typeOk != 0) {
            if (move_uploaded_file($_FILES["dokumen_siswa"]["tmp_name"], $target_file)) {
                if (!empty($row['foto_siswa']) && file_exists($target_dir . $row['foto_siswa'])) {
                    unlink($target_dir . $row['foto_siswa']);
                }
                $foto_siswa = $file_name;
            }
        }
    }

    $sql = "UPDATE tabel_siswa SET nama_siswa='$nama_siswa', tanggal_lahir='$tanggal_lahir', tahun_masuk='$tahun_masuk', alamat_siswa='$alamat_siswa', foto_siswa='$foto_siswa' WHERE id_siswa=" . $_GET['id_siswa'];

    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Data Santri berhasil diedit.')</script>";
        echo "<script>window.location.href='index.php?page=siswa&item=tampil_siswa';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
}

?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Data Santri</h1>
    </div>
    <br>
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Santri</h5>
                <form class="needs-validation" novalidate action="" method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <div class="col-sm-12 text-center">
                            <?php if (!empty($row['foto_siswa'])): ?>
                                <img src="siswa/uploads/<?= $row['foto_siswa']; ?>" alt="Foto Santri" class="img-thumbnail" style="max-width: 200px;">
                            <?php else: ?>
                                <p>Foto tidak tersedia</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nama_siswa" class="col-sm-2 col-form-label">Nama Santri</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" required value="<?= $row['nama_siswa']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required value="<?= $row['tanggal_lahir']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tahun_masuk" class="col-sm-2 col-form-label">Tahun Masuk</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="tahun_masuk" name="tahun_masuk" required value="<?= $row['tahun_masuk']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alamat_siswa" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat_siswa" name="alamat_siswa" required value="<?= $row['alamat_siswa']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="dokumen_siswa" class="col-sm-2 col-form-label">Foto Santri</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="dokumen_siswa" name="dokumen_siswa">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 justify-content-end d-flex">
                            <button type="submit" name="submit" class="btn btn-primary">Edit Data Santri</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
