<main id="main" class="main">

  <div class="pagetitle">
    <h1>Data Siswa</h1>
    <!-- <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav> -->
  </div><!-- End Page Title -->
  <br>
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title" style="flex: 1;">Siswa</h5>
            <!-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> -->

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama Siswa</th>
                  <th scope="col">Tanggal Lahir</th>
                  <th scope="col">Tahun Masuk</th>
                  <th scope="col">Alamat</th>
                  <th scope="col" class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                require_once "koneksi.php";
                require_once "utils.php";

                $no = 1;
                $sql = "SELECT * FROM tabel_siswa ORDER BY id_siswa DESC";
                $result = $mysqli->query($sql);
                ?>
                <?php while ($row = $result->fetch_assoc()) : ?>
                  <tr>
                    <th class="align-middle" scope="row"><?= $no++; ?></th>
                    <td class="align-middle"><?= $row['nama_siswa']; ?></td>
                    <td class="align-middle"><?= $row['tanggal_lahir']; ?></td>
                    <td class="align-middle"><?= $row['tahun_masuk']; ?></td>
                    <td class="align-middle"><?= $row['alamat_siswa']; ?></td>
                    <td class="d-flex justify-content-center gap-1">
                      <a href="index.php?page=siswa&item=edit_siswa&id_siswa=<?= $row['id_siswa']; ?>" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                      <a href="index.php?page=siswa&item=delete_siswa&id_siswa=<?= $row['id_siswa']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i></a>
                      <a href="index.php?page=siswa&item=cetak_siswa&id_siswa=<?= $row['id_siswa']; ?>" class="btn btn-primary"><i class="bi bi-printer"></i> Cetak KTS</a>
                    </td>
                  </tr>
                <?php endwhile; ?>
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>

<!-- </main> -->