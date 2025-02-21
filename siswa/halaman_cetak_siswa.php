<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Siswa</h1>
    </div><!-- End Page Title -->
    <br>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title" style="flex: 1;">Siswa</h5>
                        <?php
                    require_once "koneksi.php";
                    require_once "utils.php";

                    $id_siswa = $_GET['id_siswa'];
                    $sql = "SELECT * FROM tabel_siswa WHERE id_siswa = '$id_siswa'";
                    $result = $mysqli->query($sql);
                    $siswa = $result->fetch_assoc();
                    ?>
                        <!-- Table with stripped rows -->
                        <div class="kartu">
                            <h3>Kartu Tanda Santri</h3>
                            <div class="col-sm-12 text-center">
                            <?php if (!empty($row['foto_siswa'])): ?>
                                <img src="siswa/uploads/<?= $row['foto_siswa']; ?>" alt="Foto Santri" class="img-thumbnail" style="max-width: 200px;">
                            <?php else: ?>
                                <p>Foto tidak tersedia</p>
                            <?php endif; ?>
                        </div>
                            <p><strong>Nama:</strong> <?= $siswa['nama_siswa']; ?></p>
                            <p><strong>Tanggal Lahir:</strong> <?= $siswa['tanggal_lahir']; ?></p>
                            <p><strong>Tahun Masuk:</strong> <?= $siswa['tahun_masuk']; ?></p>
                            <p><strong>Alamat:</strong> <?= $siswa['alamat_siswa']; ?></p>
                            <button class="btn-print" onclick="window.print()">Cetak</button>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- </main> -->