<?php
if (isset($_POST['submit'])) {
    require_once "koneksi.php";

    $username_user = $_POST['username_user'];
    $password_user = $_POST['password_user'];

    // Query untuk mendapatkan hash password dari database
    $sql = "SELECT * FROM tabel_user WHERE username_user=?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('s', $username_user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verifikasi password
        if (password_verify($password_user, $user['password_user'])) {
            $_SESSION['nama_user'] = $user['nama_user'];
            $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['status_user'] = $user['status_user'];
            header('Location: index.php');
        } else {
            echo "<script>alert('Username atau Password Salah!');</script>";
        }
    } else {
        echo "<script>alert('Username atau Password Salah!');</script>";
    }
}
?>

<main>
<div class="container">

<section class="section register min-vh-100 d-flex align-items-center justify-content-center py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-xxl-7 col-lg-8 col-md-10 d-flex flex-row align-items-center">

                <!-- Bagian kiri: Form Login -->
                <div class="card mb-3 flex-fill me-4">
                    <div class="card-body">
                        <div class="pt-4 pb-2">
                            <h5 class="card-title text-center pb-0 fs-5">Login</h5>
                            <p class="text-center">Masukkan username dan password Anda</p>
                        </div>

                        <form class="row g-3 needs-validation mt-1" novalidate method="POST">
                            <div class="col-12">
                                <label for="username_user" class="form-label">Username</label>
                                <input type="text" autofocus name="username_user" class="form-control" id="username_user" required>
                                <div class="invalid-feedback">Masukkan username.</div>
                            </div>

                        <div class="col-12">
                                <label for="password_user" class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" name="password_user" class="form-control" id="password_user" required>
                                    <button type="button" class="btn btn-outline-secondary" id="togglePassword" style="padding: 0.25rem 0.5rem;">
                                        <i class="bi bi-eye" id="toggleIcon"></i>
                                    </button>
                                </div>
                                <div class="invalid-feedback">Masukkan Password!</div>
                            </div>
                            <script>
                                document.getElementById('togglePassword').addEventListener('click', function () {
                                    const passwordInput = document.getElementById('password_user');
                                    const passwordType = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                                    passwordInput.setAttribute('type', passwordType);
                                    
                                    // Ganti ikon berdasarkan tipe password
                                    const toggleIcon = document.getElementById('toggleIcon');
                                    toggleIcon.classList.toggle('bi-eye'); // Ganti ikon mata terbuka
                                    toggleIcon.classList.toggle('bi-eye-slash'); // Ganti ikon mata tertutup
                                });
                            </script>
                            <div class="col-12">
                                <button class="btn btn-primary w-100" name="submit" type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Bagian kanan: Gambar dan Nama Website -->
                <div class="d-flex flex-column align-items-center text-center flex-fill">
                <img src="assets/img/piq.png" width="180" alt="Logo PIQ" class="mb-4" id="logo" style="animation: open-close 2s ease-in-out infinite;">
                <style>
                    @keyframes open-close {
                        0% {
                            transform: rotateY(0deg); /* Posisi awal */
                        }
                        50% {
                            transform: rotateY(90deg); /* Berputar hingga 90 derajat */
                        }
                        100% {
                            transform: rotateY(0deg); /* Kembali ke posisi awal */
                        }
                    }
                </style>
                    <h5 class="card-title fs-5">E-PIQ<br>Pengarsipan Surat, Inventaris, dan Mutasi Barang Pesantren Ilmu Al-Qur'an</h5>
                    <p class="text-muted">Pesantren Ilmu AL-Qur'an</p>
                </div>

            </div>
        </div>
    </div>
</section>

</div>

</main><!-- End #main -->
