<?php

if (isset($_POST['submit'])) {
    require_once "koneksi.php";

    // Menangkap data dari form
    $nama_user = $_POST['nama_user'];
    $username_user = $_POST['username_user'];
    $password_user = $_POST['password_user'];
    $status_user = $_POST['status_user'];

    // Pastikan password dienkripsi menggunakan password_hash jika diberikan
    if (!empty($password_user)) {
        $password_user = password_hash($password_user, PASSWORD_DEFAULT); // Enkripsi password
    }

    // Menghindari SQL Injection dengan menggunakan prepared statements
    $stmt = $mysqli->prepare("INSERT INTO tabel_user (nama_user, username_user, password_user, status_user) VALUES (?, ?, ?, ?)");

    // Bind parameter ke dalam prepared statement
    $stmt->bind_param("ssss", $nama_user, $username_user, $password_user, $status_user);

    // Eksekusi query
    if ($stmt->execute()) {
        echo "<script>alert('User berhasil ditambahkan.')</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Menutup statement setelah selesai
    $stmt->close();
}
?>

<!-- Form HTML untuk menambahkan user -->
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tambah User</h1>
    </div><!-- End Page Title -->
    <br>
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">User</h5>

                <!-- General Form Elements -->
                <form class="needs-validation" novalidate action="" method="POST">
                    <div class="row mb-3">
                        <label for="nama_user" class="col-sm-2 col-form-label">Nama User</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_user" name="nama_user" required>
                            <div class="invalid-feedback">Harap isi Nama User.</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="username_user" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="username_user" name="username_user" required>
                            <div class="invalid-feedback">Harap isi Username.</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password_user" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="password" name="password_user" class="form-control" id="password_user" required>
                                <button type="button" class="btn btn-outline-secondary" id="togglePassword" style="padding: 0.25rem 0.5rem;">
                                    <i class="bi bi-eye" id="toggleIcon"></i>
                                </button>
                            </div>

                            <div class="invalid-feedback">Masukkan Password!</div>
                        </div>
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
                    <div class="row mb-3">
                        <label for="status_user" class="col-sm-2 col-form-label">Status User</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="status_user" required>
                                <option value="ADMIN">Admin</option>
                                <option value="PETUGAS">Petugas</option>
                            </select>
                            <div class="invalid-feedback">Harap isi Status User.</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12 justify-content-end d-flex">
                            <button type="submit" name="submit" class="btn btn-primary">Tambah User</button>
                        </div>
                    </div>
                </form><!-- End General Form Elements -->
            </div>
        </div>
    </section>
</main><!-- End #main -->