<?php
require_once "koneksi.php";
require_once "utils.php";

if (isset($_POST['submit'])) {
    $nama_siswa = $_POST['nama_siswa'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $tahun_masuk = $_POST['tahun_masuk'];
    $alamat_siswa = $_POST['alamat_siswa'];

    // Menghandle upload foto
    $foto_siswa = ""; // Default jika tidak ada foto
    if (isset($_FILES['dokumen_siswa']) && $_FILES['dokumen_siswa']['error'] == 0) {
        $target_dir = "siswa/uploads/";  // Folder tempat foto disimpan
        $file_name = date("YmdHis_") . basename($_FILES["dokumen_siswa"]["name"]);
        $target_file = $target_dir . $file_name;
        $uploadOk = 1;
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Validasi ukuran dan tipe file
        $sizeOk = checkFileSize($_FILES["dokumen_siswa"]["size"], 5000000);  // Maksimal 5MB
        $typeOk = allowedFileType($file_type, ['jpg', 'png', 'jpeg']);

        if ($sizeOk != 0 && $typeOk != 0) {
            // Jika file valid, pindahkan file ke folder
            if (move_uploaded_file($_FILES["dokumen_siswa"]["tmp_name"], $target_file)) {
                $foto_siswa = $file_name; // Menyimpan nama file foto
            } else {
                echo "Error: Gagal mengunggah foto.";
            }
        } else {
            echo "Error: File tidak memenuhi kriteria ukuran atau tipe.";
        }
    }

    // Menyimpan data ke database, termasuk nama file foto
    $sql = "
        INSERT INTO tabel_siswa (
            nama_siswa, 
            tanggal_lahir, 
            tahun_masuk,
            alamat_siswa,
            foto_siswa  -- Menambahkan kolom foto_siswa untuk menyimpan nama file
        ) VALUES (
            '$nama_siswa', 
            '$tanggal_lahir',
            '$tahun_masuk',
            '$alamat_siswa',
            '$foto_siswa'  -- Nama file foto yang disimpan di server
        )";

    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Data Santri berhasil ditambahkan.')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
}
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tambah Data Santri</h1>
    </div><!-- End Page Title -->
    <br>
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Diri Santri</h5>

                <!-- General Form Elements -->
                <form class="needs-validation" novalidate action="" method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="nama_siswa" class="col-sm-2 col-form-label">Nama Santri</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_siswa" required name="nama_siswa">
                            <div class="invalid-feedback">
                                Harap isi Nama Santri.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal_lahir" required name="tanggal_lahir">
                            <div class="invalid-feedback">
                                Harap isi Tanggal Lahir.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tahun_masuk" class="col-sm-2 col-form-label">Tahun Masuk</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="tahun_masuk" name="tahun_masuk" required>
                            <div class="invalid-feedback">
                                Harap isi Tahun Masuk.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alamat_siswa" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat_siswa" name="alamat_siswa" required>
                            <div class="invalid-feedback">
                                Harap isi Alamat Santri.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="dokumen_siswa" class="col-sm-2 col-form-label">Foto Santri</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="dokumen_siswa" name="dokumen_siswa" required>
                            <div class="invalid-feedback">
                                Harap pilih Foto Santri.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 justify-content-end d-flex">
                            <button type="submit" name="submit" class="btn btn-primary">Tambah Data</button>
                        </div>
                    </div>
                </form><!-- End General Form Elements -->

            </div>
        </div>
    </section>
</main><!-- End #main -->
