<?php include_once "header.php"; ?>
<?php
if (isset($_SESSION['id_user'])) {
  include_once "navbar.php";
  if ($_SESSION['status_user'] == 'ADMIN') include_once "sidebar_admin.php";
  else if ($_SESSION['status_user'] == 'PETUGAS') include_once "sidebar_petugas.php";
  if (isset($_GET['page'])) {
    if ($_GET['page'] == 'surat_masuk' && $_GET['item'] == 'tambah_surat_masuk')
      include_once "surat_masuk/halaman_tambah_surat_masuk.php";
    else if ($_GET['page'] == 'surat_keluar' && $_GET['item'] == 'tambah_surat_keluar')
        include_once "surat_keluar/halaman_tambah_surat_keluar.php";
    else if ($_GET['page'] == 'ruangan' && $_GET['item'] == 'tambah_ruangan')
        include_once "ruangan/halaman_tambah_ruangan.php";
    else if ($_GET['page'] == 'kode_surat' && $_GET['item'] == 'tambah_kode_surat')
        include_once "kode_surat/halaman_tambah_kode_surat.php";
    else if ($_GET['page'] == 'user' && $_GET['item'] == 'tambah_user')
        include_once "user/halaman_tambah_user.php";
    else if ($_GET['page'] == 'agenda' && $_GET['item'] == 'tambah_agenda')
        include_once "agenda/halaman_tambah_agenda.php";
    else if ($_GET['page'] == 'arsip' && $_GET['item'] == 'tambah_arsip')
        include_once "arsip/halaman_tambah_arsip.php";
    else if ($_GET['page'] == 'inventaris' && $_GET['item'] == 'tambah_inventaris')
        include_once "inventaris/halaman_tambah_inventaris.php";
    else if ($_GET['page'] == 'inventaris' && $_GET['item'] == 'tambah_peminjaman_inventaris')
        include_once "inventaris/halaman_tambah_peminjaman_inventaris.php";
    else if ($_GET['page'] == 'surat_masuk' && $_GET['item'] == 'tampil_surat_masuk')
        include_once "surat_masuk/halaman_tampil_surat_masuk.php";
    else if ($_GET['page'] == 'surat_keluar' && $_GET['item'] == 'tampil_surat_keluar')
        include_once "surat_keluar/halaman_tampil_surat_keluar.php";
    else if ($_GET['page'] == 'ruangan' && $_GET['item'] == 'tampil_ruangan')
        include_once "ruangan/halaman_tampil_ruangan.php";
    else if ($_GET['page'] == 'kode_surat' && $_GET['item'] == 'tampil_kode_surat')
        include_once "kode_surat/halaman_tampil_kode_surat.php";
    else if ($_GET['page'] == 'user' && $_GET['item'] == 'tampil_user')
        include_once "user/halaman_tampil_user.php";
    else if ($_GET['page'] == 'agenda' && $_GET['item'] == 'tampil_agenda')
        include_once "agenda/halaman_tampil_agenda.php";
    else if ($_GET['page'] == 'arsip' && $_GET['item'] == 'tampil_arsip')
        include_once "arsip/halaman_tampil_arsip.php";
    else if ($_GET['page'] == 'inventaris' && $_GET['item'] == 'tampil_inventaris')
        include_once "inventaris/halaman_tampil_inventaris.php";
    else if ($_GET['page'] == 'inventaris' && $_GET['item'] == 'tampil_peminjaman_inventaris')
        include_once "inventaris/halaman_tampil_peminjaman_inventaris.php";
    else if ($_GET['page'] == 'surat_masuk' && $_GET['item'] == 'edit_surat_masuk')
        include_once "surat_masuk/halaman_edit_surat_masuk.php";
    else if ($_GET['page'] == 'surat_masuk' && $_GET['item'] == 'delete_surat_masuk')
        include_once "surat_masuk/halaman_delete_surat_masuk.php";
    else if ($_GET['page'] == 'surat_keluar' && $_GET['item'] == 'edit_surat_keluar')
        include_once "surat_keluar/halaman_edit_surat_keluar.php";
    else if ($_GET['page'] == 'surat_keluar' && $_GET['item'] == 'delete_surat_keluar')
        include_once "surat_keluar/halaman_delete_surat_keluar.php";
    else if ($_GET['page'] == 'ruangan' && $_GET['item'] == 'edit_ruangan')
        include_once "ruangan/halaman_edit_ruangan.php";
    else if ($_GET['page'] == 'ruangan' && $_GET['item'] == 'delete_ruangan')
        include_once "ruangan/halaman_delete_ruangan.php";
    else if ($_GET['page'] == 'kode_surat' && $_GET['item'] == 'edit_kode_surat')
        include_once "kode_surat/halaman_edit_kode_surat.php";
    else if ($_GET['page'] == 'kode_surat' && $_GET['item'] == 'delete_kode_surat')
        include_once "kode_surat/halaman_delete_kode_surat.php";
    else if ($_GET['page'] == 'user' && $_GET['item'] == 'edit_user')
        include_once "user/halaman_edit_user.php";
    else if ($_GET['page'] == 'user' && $_GET['item'] == 'delete_user')
        include_once "user/halaman_delete_user.php";
    else if ($_GET['page'] == 'agenda' && $_GET['item'] == 'edit_agenda')
        include_once "agenda/halaman_edit_agenda.php";
    else if ($_GET['page'] == 'agenda' && $_GET['item'] == 'delete_agenda')
        include_once "agenda/halaman_delete_agenda.php";
    else if ($_GET['page'] == 'arsip' && $_GET['item'] == 'edit_arsip')
        include_once "arsip/halaman_edit_arsip.php";
    else if ($_GET['page'] == 'arsip' && $_GET['item'] == 'delete_arsip')
        include_once "arsip/halaman_delete_arsip.php";
    else if ($_GET['page'] == 'inventaris' && $_GET['item'] == 'edit_inventaris')
        include_once "inventaris/halaman_edit_inventaris.php";
    else if ($_GET['page'] == 'inventaris' && $_GET['item'] == 'delete_inventaris')
        include_once "inventaris/halaman_delete_inventaris.php";
    else if ($_GET['page'] == 'inventaris' && $_GET['item'] == 'edit_peminjaman_inventaris')
        include_once "inventaris/halaman_edit_peminjaman_inventaris.php";
    else if ($_GET['page'] == 'inventaris' && $_GET['item'] == 'delete_peminjaman_inventaris')
        include_once "inventaris/halaman_delete_peminjaman_inventaris.php";
    else if ($_GET['page'] == 'inventaris' && $_GET['item'] == 'detail_peminjaman_inventaris')
        include_once "inventaris/halaman_detail_peminjaman_inventaris.php";

    else if ($_GET['page'] == 'siswa' && $_GET['item'] == 'tambah_siswa')
        include_once "siswa/halaman_tambah_siswa.php";
    else if ($_GET['page'] == 'siswa' && $_GET['item'] == 'tampil_siswa')
        include_once "siswa/halaman_tampil_siswa.php";
    else if ($_GET['page'] == 'siswa' && $_GET['item'] == 'delete_siswa')
        include_once "siswa/halaman_delete_siswa.php";
    else if ($_GET['page'] == 'siswa' && $_GET['item'] == 'edit_siswa')
        include_once "siswa/halaman_edit_siswa.php";
    else if ($_GET['page'] == 'siswa' && $_GET['item'] == 'cetak_siswa')
        include_once "siswa/halaman_cetak_siswa.php";
    

    else if ($_GET['page'] == 'keluar')
        include_once "auth/halaman_logout.php";
    else if ($_GET['page'] == 'laporan')
        include_once "laporan/halaman_laporan.php";
    else if ($_GET['page'] == 'ganti_password')
        include_once "halaman_ganti_password.php";
    else if ($_GET['page'] == 'pengembang')
        include_once "halaman_pengembang.php";
  } else {
    include_once "halaman_beranda.php";
  }
} else include_once "auth/halaman_login.php";

?>
<?php include_once "footer.php"; ?>