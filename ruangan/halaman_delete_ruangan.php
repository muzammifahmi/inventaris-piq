<?php

// Mulai output buffering
ob_start();

if (isset($_GET['id_ruangan'])) {
    require_once "koneksi.php";

    // Mengamankan input
    $id_ruangan = (int)$_GET['id_ruangan']; // Casting to integer for safety

    // Menggunakan prepared statement untuk menghindari SQL injection
    $stmt = $mysqli->prepare("DELETE FROM tabel_ruangan WHERE id_ruangan = ?");
    
    if ($stmt) {
        // Mengikat parameter
        $stmt->bind_param("i", $id_ruangan);
        
        // Menjalankan query
        if ($stmt->execute()) {
            echo "<script>alert('Ruangan berhasil dihapus.')</script>";
            echo "<script>window.location.href='index.php?page=ruangan&item=tampil_ruangan';</script>";
        } else {
            echo "Error: " . $stmt->error;
        }
        
        // Menutup statement
        $stmt->close();
    } else {
        echo "Error: " . $mysqli->error;
    }
} else {
    echo "<script>window.location.href='index.php?page=ruangan&item=tampil_ruangan';</script>";
}

// Mengakhiri output buffering dan mengeluarkan konten
ob_end_flush();