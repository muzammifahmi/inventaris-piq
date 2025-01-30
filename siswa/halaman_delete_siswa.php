<?php

// Mulai output buffering
ob_start();

if (isset($_GET['id_siswa'])) {
    require_once "koneksi.php";

    // Mengamankan input
    $id_siswa = (int)$_GET['id_siswa']; // Casting to integer for safety

    // Menggunakan prepared statement untuk menghindari SQL injection
    $stmt = $mysqli->prepare("DELETE FROM tabel_siswa WHERE id_siswa = ?");
    
    if ($stmt) {
        // Mengikat parameter
        $stmt->bind_param("i", $id_siswa);
        
        // Menjalankan query
        if ($stmt->execute()) {
            echo "<script>alert('Data Santri berhasil dihapus.')</script>";
            echo "<script>window.location.href='index.php?page=siswa&item=tampil_siswa';</script>";
        } else {
            echo "Error: " . $stmt->error;
        }
        
        // Menutup statement
        $stmt->close();
    } else {
        echo "Error: " . $mysqli->error;
    }
} else {
    echo "<script>window.location.href='index.php?page=siswa&item=tampil_siswa';</script>";
}

// Mengakhiri output buffering dan mengeluarkan konten
ob_end_flush();