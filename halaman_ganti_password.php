<?php
require_once "koneksi.php";

if (isset($_POST['submit'])) {

    // Ambil ID user dari session
    $id_user = $_SESSION['id_user'];
    $password_lama = $_POST['password_lama'];
    $password_baru = $_POST['password_baru'];
    $konfirmasi_password_baru = $_POST['konfirmasi_password_baru'];

    // Ambil data user berdasarkan id_user
    $sql = "SELECT * FROM tabel_user WHERE id_user='$id_user'";
    if ($result = $mysqli->query($sql)) {
        if (mysqli_num_rows($result) > 0) {
            $user = $result->fetch_assoc();
            // Verifikasi password lama
            if (password_verify($password_lama, $user['password_user'])) {
                if ($password_baru === $konfirmasi_password_baru) {
                    // Hash password baru sebelum disimpan
                    $password_baru_hashed = password_hash($password_baru, PASSWORD_DEFAULT);
                    $sql = "UPDATE tabel_user SET password_user='$password_baru_hashed' WHERE id_user='$id_user'";
                    if ($mysqli->query($sql) === TRUE) {
                        echo "<script>alert('Password Berhasil Diperbaharui, Silakan login ulang!')</script>";
                        echo "<script>window.location.href ='index.php?page=keluar'</script>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $mysqli->error;
                    }
                } else {
                    echo "<script>alert('Password Baru Tidak Cocok!')</script>";
                }
            } else {
                echo "<script>alert('Password Lama Salah!')</script>";
            }
        } else {
            echo "<script>alert('User tidak ditemukan!')</script>";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
}
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Akun</h1>
    </div><!-- End Page Title -->
    <br>
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Ganti Password</h5>

                <!-- General Form Elements -->
                <form class="needs-validation" novalidate action="" method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="password_lama" class="col-sm-3 col-form-label">Password Lama</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="password_lama" required name="password_lama">
                            <div class="invalid-feedback">
                                Harap isi Password Lama.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password_baru" class="col-sm-3 col-form-label">Password Baru</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="password_baru" required name="password_baru">
                            <div class="invalid-feedback">
                                Harap isi Password Baru.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="konfirmasi_password_baru" class="col-sm-3 col-form-label">Konfirmasi Password Baru</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="konfirmasi_password_baru" required name="konfirmasi_password_baru">
                            <div class="invalid-feedback">
                                Harap isi Konfirmasi Password Baru.
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 justify-content-end d-flex">
                            <button type="submit" name="submit" class="btn btn-primary">Ganti Password</button>
                        </div>
                    </div>

                </form><!-- End General Form Elements -->

            </div>
        </div>
    </section>

</main><!-- End #main -->
