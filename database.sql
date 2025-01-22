CREATE DATABASE barang;
use barang;

CREATE TABLE `tabel_arsip` (
    id_arsip INT NOT NULL AUTO_INCREMENT,
    lokasi varchar(255),
    nomor_dokumen VARCHAR(255),
    nama_dokumen VARCHAR(255),
    tanggal DATE,
    keterangan VARCHAR(255),
    PRIMARY KEY(id_arsip)
);
INSERT INTO `tabel_arsip` (
    lokasi,
    nomor_dokumen,
    nama_dokumen,
    tanggal,
    keterangan
) VALUES
('Rak A1', 'DOC001', 'Surat Keputusan Kepala Pondok', '2024-01-10', 'Dokumen Penting'),
('Rak A2', 'DOC002', 'Daftar Santri Baru', '2024-02-15', 'Data Santri'),
('Rak B1', 'DOC003', 'Rencana Anggaran 2024', '2024-03-01', 'Keuangan Pondok'),
('Rak B2', 'DOC004', 'Jadwal Pengajian Harian', '2024-04-05', 'Jadwal Harian'),
('Rak C1', 'DOC005', 'Laporan Tahunan', '2023-12-25', 'Evaluasi Kegiatan'),
('Rak C2', 'DOC006', 'Ijazah Santri', '2024-06-20', 'Arsip Pendidikan'),
('Lemari D1', 'DOC007', 'Data Inventaris Asrama', '2024-07-15', 'Barang dan Fasilitas'),
('Lemari D2', 'DOC008', 'Nota Pembelian Kitab', '2024-08-10', 'Arsip Keuangan'),
('Laci E1', 'DOC009', 'Sertifikat Kegiatan', '2024-09-05', 'Dokumen Sertifikat'),
('Laci E2', 'DOC010', 'Surat Perjanjian Donatur', '2024-10-01', 'Donasi Pondok'),
('Rak F1', 'DOC011', 'Absensi Santri', '2024-11-10', 'Arsip Kehadiran'),
('Rak F2', 'DOC012', 'Daftar Piket Mingguan', '2024-11-15', 'Jadwal Kegiatan'),
('Rak G1', 'DOC013', 'Program Peningkatan Hafalan', '2024-05-01', 'Pengembangan Santri'),
('Rak G2', 'DOC014', 'Data Alumni Pondok', '2024-06-01', 'Database Alumni'),
('Lemari H1', 'DOC015', 'Nota Pembelian Makanan', '2024-04-15', 'Keperluan Harian'),
('Lemari H2', 'DOC016', 'Proposal Pembangunan Gedung Baru', '2024-07-01', 'Proyek Pondok'),
('Laci I1', 'DOC017', 'Panduan Kurikulum 2024', '2024-03-20', 'Dokumen Pendidikan'),
('Laci I2', 'DOC018', 'Surat Undangan Seminar', '2024-05-10', 'Acara Eksternal'),
('Rak J1', 'DOC019', 'Laporan Perbaikan Asrama', '2024-02-25', 'Fasilitas Pondok'),
('Rak J2', 'DOC020', 'Dokumen Perizinan Pondok', '2024-01-05', 'Legalitas');


CREATE TABLE `tabel_inventaris` (
    id_inventaris INT NOT NULL AUTO_INCREMENT,
    nama VARCHAR(255) NOT NULL,
    merk VARCHAR(255) NOT NULL,
    jumlah INT NOT NULL,
    harga BIGINT NOT NULL,
    tanggal_pembelian DATE NOT NULL,
    keterangan VARCHAR(255) NULL,
    PRIMARY KEY (id_inventaris)
);


INSERT INTO `tabel_inventaris` (
    nama,
    merk,
    jumlah,
    harga,
    tanggal_pembelian,
    keterangan 
) VALUES 
('Laptop ASUS', 'ASUS K513EA', 10, 10000000, CURRENT_DATE(), 'Barang Baru'),
('Komputer', 'HP', 2, 50000000, CURRENT_DATE(), 'Dalam Perbaikan'),
('Kitab Fathul Mu’in', 'Dar Al-Kutub', 50, 50000, CURRENT_DATE(), 'Bekas Pemakaian'),
('Meja Lipat Santri', 'Furniture Malang', 20, 250000, CURRENT_DATE(), 'Kondisi Baik'),
('Speaker Aktif', 'JBL', 5, 1500000, CURRENT_DATE(), 'Kondisi Bagus'),
('Rak Kitab', 'Furniture Surabaya', 10, 750000, CURRENT_DATE(), 'Barang Baru'),
('Karpet Masjid', 'Al-Madina', 3, 5000000, CURRENT_DATE(), 'Usang'),
('Komputer Administrasi', 'Lenovo', 2, 7000000, CURRENT_DATE(), 'Dalam Perbaikan'),
('Kipas Angin', 'Miyako', 15, 300000, CURRENT_DATE(), 'Rusak'),
('CCTV', 'Dahua', 8, 1200000, CURRENT_DATE(), 'Barang Baru'),
('Proyektor', 'Epson', 1, 6000000, CURRENT_DATE(), 'Kondisi Bagus'),
('Papan Tulis', 'GlassBoard', 5, 400000, CURRENT_DATE(), 'Bekas Pakai'),
('Al-Qur’an Digital', 'Qalam', 20, 250000, CURRENT_DATE(), 'Barang Baru'),
('Mic Wireless', 'Shure', 3, 2200000, CURRENT_DATE(), 'Kondisi Baik'),
('Peralatan Dapur', 'Philips', 15, 100000, CURRENT_DATE(), 'Baru Dibeli'),
('Kursi Majelis', 'Ergofit', 25, 300000, CURRENT_DATE(), 'Kondisi Bagus'),
('Printer Multifungsi', 'Canon', 2, 2500000, CURRENT_DATE(), 'Sering Macet'),
('Buku Iqra’', 'Pustaka Al-Falah', 100, 10000, CURRENT_DATE(), 'Bekas Pemakaian'),
('Sound System', 'Yamaha', 1, 15000000, CURRENT_DATE(), 'Barang Baru'),
('Generator Listrik', 'Honda', 1, 18000000, CURRENT_DATE(), 'Sering Digunakan'),
('Tempat Tidur Tingkat', 'BesiIndo', 10, 1500000, CURRENT_DATE(), 'Kondisi Baik'),
('Televisi LED', 'Samsung', 2, 5000000, CURRENT_DATE(), 'Barang Baru'),
('Buku Tafsir Jalalain', 'Pustaka Imam Syafi’i', 30, 60000, CURRENT_DATE(), 'Bekas Pemakaian'),
('Laptop Guru', 'Dell', 5, 8000000, CURRENT_DATE(), 'Dalam Perbaikan'),
('Kamera Dokumentasi', 'Canon', 1, 7000000, CURRENT_DATE(), 'Kondisi Baik'),
('Kursi Lipat', 'ACE Hardware', 50, 200000, CURRENT_DATE(), 'Barang Baru'),
('Kompor Gas', 'Rinnai', 4, 750000, CURRENT_DATE(), 'Kondisi Bagus'),
('Jam Dinding', 'Seiko', 10, 250000, CURRENT_DATE(), 'Kondisi Baik'),
('Mesin Fotokopi', 'Ricoh', 1, 15000000, CURRENT_DATE(), 'Sering Bermasalah'),
('Lampu LED', 'Philips', 20, 75000, CURRENT_DATE(), 'Barang Baru'),
('Sepatu Sandal Santri', 'Bata', 50, 100000, CURRENT_DATE(), 'Bekas Pemakaian'),
('Tenda Acara', 'Eiger', 3, 5000000, CURRENT_DATE(), 'Kondisi Bagus'),
('Meja Makan', 'Furniture Jepara', 10, 3000000, CURRENT_DATE(), 'Kondisi Baik'),
('Mesin Cuci', 'LG', 2, 4000000, CURRENT_DATE(), 'Dalam Perbaikan'),
('Pengeras Suara Portable', 'Sony', 4, 1200000, CURRENT_DATE(), 'Barang Baru'),
('Bantal dan Selimut', 'King Koil', 30, 200000, CURRENT_DATE(), 'Baru Dibeli'),
('Wastafel Portable', 'Sanitech', 5, 800000, CURRENT_DATE(), 'Kondisi Baik'),
('Whiteboard', 'Magnetic', 6, 500000, CURRENT_DATE(), 'Bekas Pakai');

CREATE TABLE `tabel_peminjaman_inventaris` (
    id_peminjaman_inventaris INT NOT NULL AUTO_INCREMENT,
    id_inventaris INT NOT NULL,
    nama VARCHAR(255) NOT NULL,
    nomor_telepon VARCHAR(255) NOT NULL,
    tanggal_pinjam DATE NOT NULL,
    sampai DATETIME NOT NULL,
    keperluan VARCHAR(255) NOT NULL,
    status ENUM('PENGAJUAN', 'DITERIMA' , 'DITOLAK') NOT NULL,
    PRIMARY KEY (id_peminjaman_inventaris),
    FOREIGN KEY (id_inventaris) REFERENCES tabel_inventaris (id_inventaris) ON DELETE CASCADE
);

CREATE TABLE `tabel_ruangan` (
    id_ruangan INT NOT NULL AUTO_INCREMENT,
    nama_ruangan VARCHAR(255) NOT NULL,
    singkatan VARCHAR(10) UNIQUE NOT NULL,
    fasilitas VARCHAR(255) NOT NULL,
    keterangan VARCHAR(255) NULL,
    PRIMARY KEY(id_ruangan)
);

INSERT INTO `tabel_ruangan` (
    nama_ruangan,
    singkatan,
    keterangan 
) VALUES 
('Kantor Madrasah Diniyah', 'MD', ''),
('Kantor Tata Usaha', 'TU', ''),
('Ruang Tamu', 'RT', ''),
('Perpustakaan', 'PR', ''),
('Aula Hijau', 'AH', ''),
('Aula Kampus 2', 'AK', ''),
('Ruang Kelas', 'RK', ''),
('Aula Maulid', 'AM', ''),
('Aula Serba Guna', 'ASG', ''),
('Kantor SMP', 'KS', '');

CREATE TABLE `tabel_kode_surat` (
    id_kode_surat INT NOT NULL AUTO_INCREMENT,
    jenis_surat VARCHAR(50) NOT NULL,
    singkatan VARCHAR(10) UNIQUE NOT NULL,
    PRIMARY KEY(id_kode_surat)
);

INSERT INTO `tabel_kode_surat` (
    jenis_surat,
    singkatan
) VALUES 
('Surat Keputusan', 'SK'),
('Surat Undangan', 'SU'),
('Surat Permohonan', 'SPm'),
('Surat Pemberitahuan', 'SPb'),
('Surat Peminjaman', 'SPp'),
('Surat Pernyataan', 'SPn'),
('Surat Mandat', 'SM'),
('Surat Tugas', 'ST'),
('Surat Keterangan', 'Sket'),
('Surat Rekomendasi', 'SR'),
('Surat Balasan', 'SB'),
('Sertifikat', 'SRT'),
('Surat Pengantar ', 'Speng');

CREATE TABLE `tabel_surat_masuk` (
    id_surat_masuk INT NOT NULL AUTO_INCREMENT,
    nomor_surat VARCHAR(255) NOT NULL,
    tanggal_surat VARCHAR(255) NOT NULL,
    perihal VARCHAR(255) NOT NULL,
    sifat_surat VARCHAR(255) NOT NULL,
    pengirim VARCHAR(255) NOT NULL,
    dokumen_surat VARCHAR(255) NULL,
    PRIMARY KEY(id_surat_masuk)
);

CREATE TABLE `tabel_surat_keluar` (
    id_surat_keluar INT NOT NULL AUTO_INCREMENT,
    id_ruangan INT NOT NULL,
    id_kode_surat INT NOT NULL,
    nomor_surat VARCHAR(255) NOT NULL,
    tanggal_surat VARCHAR(255) NOT NULL,
    sifat_surat VARCHAR(255) NOT NULL,
    dokumen_surat VARCHAR(255) NULL,
    PRIMARY KEY(id_surat_keluar),
    FOREIGN KEY(id_ruangan) REFERENCES tabel_ruangan(id_ruangan),
    FOREIGN KEY(id_kode_surat) REFERENCES tabel_kode_surat(id_kode_surat)
);


CREATE TABLE `tabel_agenda` (
    id_agenda INT NOT NULL AUTO_INCREMENT,
    id_ruangan INT NOT NULL,
    tanggal DATE NOT NULL,
    waktu TIME NOT NULL,
    detail_acara TEXT NOT NULL,
    terverifikasi TINYINT(1) NOT NULL,
    PRIMARY KEY(id_agenda),
    FOREIGN KEY(id_ruangan) REFERENCES tabel_ruangan(id_ruangan)
);

CREATE TABLE `tabel_peserta` (
    id_peserta INT NOT NULL AUTO_INCREMENT,
    id_ruangan INT NOT NULL,
    id_agenda INT NOT NULL,
    PRIMARY KEY(id_peserta),
    FOREIGN KEY(id_ruangan) REFERENCES tabel_ruangan(id_ruangan),
    FOREIGN KEY(id_agenda) REFERENCES tabel_agenda(id_agenda) ON DELETE CASCADE
);

CREATE TABLE `tabel_user` (
    id_user INT NOT NULL AUTO_INCREMENT,
    nama_user VARCHAR(255) NOT NULL,
    username_user VARCHAR(255) NOT NULL,
    password_user VARCHAR(255) NOT NULL,
    status_user ENUM('ADMIN', 'PETUGAS') NOT NULL,
    PRIMARY KEY(id_user)
);

INSERT INTO `tabel_user` VALUES 
(null, 'Achmad Muzammi Fahmi', 'admin', 'admin' , 'ADMIN'),
(null, 'Ahmad Nabil Mujaddid', 'nabil', 'nabil' , 'PETUGAS');

INSERT INTO `tabel_user` VALUES 
(NULL, 'Achmad Muzammi Fahmi', 'admin', '$2y$10$pZYsmMxGQITaGgCeL33RwuquuRcd2yR3bOxlQQI.8F3K9S0EkBDxy', 'ADMIN');
password = admin

CREATE TABLE tabel_siswa(   
    id_siswa INT NOT NULL AUTO_INCREMENT,
    nama_siswa VARCHAR(255) NOT NULL,
    tanggal_lahir DATE NOT NULL,
    tahun_masuk INT(4) NOT NULL,
    alamat_siswa VARCHAR(255) NOT NULL,
    PRIMARY KEY(id_siswa)
    );
