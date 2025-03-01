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
        <h1>Kartu Tanda Santri</h1>
    </div>
    <br>
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Cetak Kartu Tanda Santri</h5>

                <div class="kts-container" id="kartu-santri">
                    <div class="header-kts">
                        <h5>Kartu Tanda Santri</h5>
                        <img src="" alt="">
                    </div>
                    <p class="text-center">Pesantren Ilmu Al-Quran</p>

                    <div class="santri-info">
                        <div class="col-sm-12 left">
                            <?php if (!empty($row['foto_siswa'])): ?>
                                <img src="siswa/uploads/<?= $row['foto_siswa']; ?>" alt="Foto Santri" class="img-thumbnail"
                                    style="max-width: 150px;">
                            <?php else: ?>
                                <p>Foto tidak tersedia</p>
                            <?php endif; ?>
                        </div>

                        <table>
                            <tr>
                                <td>Nama Santri</td>
                                <td>&nbsp:&nbsp </td>
                                <td><?= $row['nama_siswa']; ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>&nbsp:&nbsp </td>
                                <td><?= $row['tanggal_lahir']; ?></td>
                            </tr>
                            <tr>
                                <td>Tahun Masuk</td>
                                <td>&nbsp:&nbsp </td>
                                <td><?= $row['tahun_masuk']; ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>&nbsp:&nbsp </td>
                                <td><?= $row['alamat_siswa']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-12 justify-content-end d-flex">
                        <button onclick="cetakKartu()" class="btn btn-success ms-2">Cetak Kartu</button>
                        <script>
                            function cetakKartu() {
                                var kartuSantri = document.getElementById("kartu-santri").innerHTML;
                                var printWindow = window.open('', '_blank');
                                printWindow.document.write(`
            <html>
                <head>
                    <title>Cetak Kartu Santri</title>
                    <link rel="stylesheet" href="assets/css/style.css"> <!-- Pastikan file CSS tetap diterapkan -->
                </head>
                <body onload="window.print(); window.onafterprint = function() { window.close(); }">
                    ${kartuSantri}
                </body>
            </html>
        `);
                                printWindow.document.close();
                            }
                        </script>

                    </div>
                </div>
                </form>
            </div>
        </div>
    </section>
</main>