<?php include_once "header.php"; ?>

<?php
if (isset($_SESSION['id_user'])) {
    include_once "navbar.php";

    if ($_SESSION['status_user'] == 'ADMIN') {
        include_once "sidebar_admin.php";
    } else if ($_SESSION['status_user'] == 'PETUGAS') {
        include_once "sidebar_petugas.php";
    }

    // Default page handling
    $page = isset($_GET['page']) ? $_GET['page'] : 'beranda';
    $item = isset($_GET['item']) ? $_GET['item'] : '';

    switch ($page) {
        case 'surat_masuk':
            if ($item == 'tambah_surat_masuk') {
                include_once "surat_masuk/halaman_tambah_surat_masuk.php";
            } else if ($item == 'tampil_surat_masuk') {
                include_once "surat_masuk/halaman_tampil_surat_masuk.php";
            } else if ($item == 'edit_surat_masuk') {
                include_once "surat_masuk/halaman_edit_surat_masuk.php";
            } else if ($item == 'delete_surat_masuk') {
                include_once "surat_masuk/halaman_delete_surat_masuk.php";
            }
            break;

        case 'surat_keluar':
            if ($item == 'tambah_surat_keluar') {
                include_once "surat_keluar/halaman_tambah_surat_keluar.php";
            } else if ($item == 'tampil_surat_keluar') {
                include_once "surat_keluar/halaman_tampil_surat_keluar.php";
            } else if ($item == 'edit_surat_keluar') {
                include_once "surat_keluar/halaman_edit_surat_keluar.php";
            } else if ($item == 'delete_surat_keluar') {
                include_once "surat_keluar/halaman_delete_surat_keluar.php";
            }
            break;

        case 'ruangan':
            if ($item == 'tambah_ruangan') {
                include_once "ruangan/halaman_tambah_ruangan.php";
            } else if ($item == 'tampil_ruangan') {
                include_once "ruangan/halaman_tampil_ruangan.php";
            } else if ($item == 'edit_ruangan') {
                include_once "ruangan/halaman_edit_ruangan.php";
            } else if ($item == 'delete_ruangan') {
                include_once "ruangan/halaman_delete_ruangan.php";
            }
            break;

        case 'kode_surat':
            if ($item == 'tambah_kode_surat') {
                include_once "kode_surat/halaman_tambah_kode_surat.php";
            } else if ($item == 'tampil_kode_surat') {
                include_once "kode_surat/halaman_tampil_kode_surat.php";
            } else if ($item == 'edit_kode_surat') {
                include_once "kode_surat/halaman_edit_kode_surat.php";
            } else if ($item == 'delete_kode_surat') {
                include_once "kode_surat/halaman_delete_kode_surat.php";
            }
            break;

        case 'user':
            if ($item == 'tambah_user') {
                include_once "user/halaman_tambah_user.php";
            } else if ($item == 'tampil_user') {
                include_once "user/halaman_tampil_user.php";
            } else if ($item == 'edit_user') {
                include_once "user/halaman_edit_user.php";
            } else if ($item == 'delete_user') {
                include_once "user/halaman_delete_user.php";
            }
            break;

        case 'agenda':
            if ($item == 'tambah_agenda') {
                include_once "agenda/halaman_tambah_agenda.php";
            } else if ($item == 'tampil_agenda') {
                include_once "agenda/halaman_tampil_agenda.php";
            } else if ($item == 'edit_agenda') {
                include_once "agenda/halaman_edit_agenda.php";
            } else if ($item == 'delete_agenda') {
                include_once "agenda/halaman_delete_agenda.php";
            }
            break;

        case 'arsip':
            if ($item == 'tambah_arsip') {
                include_once "arsip/halaman_tambah_arsip.php";
            } else if ($item == 'tampil_arsip') {
                include_once "arsip/halaman_tampil_arsip.php";
            } else if ($item == 'edit_arsip') {
                include_once "arsip/halaman_edit_arsip.php";
            } else if ($item == 'delete_arsip') {
                include_once "arsip/halaman_delete_arsip.php";
            }
            break;

        case 'inventaris':
            if ($item == 'tambah_inventaris') {
                include_once "inventaris/halaman_tambah_inventaris.php";
            } else if ($item == 'tampil_inventaris') {
                include_once "inventaris/halaman_tampil_inventaris.php";
            } else if ($item == 'edit_inventaris') {
                include_once "inventaris/halaman_edit_inventaris.php";
            } else if ($item == 'delete_inventaris') {
                include_once "inventaris/halaman_delete_inventaris.php";
            } else if ($item == 'detail_peminjaman_inventaris') {
                include_once "inventaris/halaman_detail_peminjaman_inventaris.php";
            }
            break;

        case 'laporan':
            include_once "laporan/halaman_laporan.php";
            break;

        case 'ganti_password':
            include_once "halaman_ganti_password.php";
            break;

        case 'keluar':
            include_once "auth/halaman_logout.php";
            break;

        default:
            include_once "halaman_beranda.php";
            break;
    }
} else {
    include_once "auth/halaman_login.php";
}

?>

<?php include_once "footer.php"; ?>
