<?php 
include_once("koneksi.php");

	session_start();
	// cek apakah yang mengakses halaman ini sudah login
	if (!isset($_SESSION['nama_pengguna'])) {
        header('location:login.php?pesan=gagal');
    }
	?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet" />

    <!-- custom css -->
    <link rel="stylesheet" href="style.css" />

    <title>Admin | Waras</title>
    <?php
    include_once("koneksi.php");

    if (isset($_GET['cari'])) {
        $cari = $_GET['cari'];
        $result = mysqli_query($koneksi, "SELECT * FROM pengguna where nama_pengguna like'%" . $cari . "%'");
    } else {
        $result = mysqli_query($koneksi, "SELECT * FROM pengguna,jabatan where pengguna.id_pengguna=jabatan.id_pengguna ORDER BY nama_pengguna ASC");
    }
    ?>
  </head>
  <body>
    <nav class="navbar navbar-dark nav-admin">
      <div class="container-fluid" height="40">
        <a class="navbar-brand" href="#">
          <img
            src="./img/logo_waras.png"
            alt=""
            width="40"
            height="40"
            class="d-inline-block align-text-button"
          />
          ꦮꦫꦱ
        </a>
        <div style="color: white;"><?php echo $_SESSION['nama_pengguna'] ?></div>
      </div>
    </nav>
    <div class="container">
      <h1 class="mt-5">Kelola Data Pengguna</h1>

      <table class="table table-bordered">
        <tr>
          <th colspan="7">Tabel Data Pengguna</th>
        </tr>
        <tr>
          <td>
            <table class="table table-bordered">
              <br />
              <div class="position-relative">
                <a href="tambahadatapengguna.php">
                  <button class="btn btn-success position-absolute top-0 start-0">
                    Tambah Data
                  </button>
                </a>
                <div class="input-group-sm position-absolute top-0 end-0">
                  <button
                    class="btn btn-success"
                    type="button"
                    id="button-addon1"
                  >
                    cari
                  </button>

                  <input
                    type="text"
                    name="cari"
                    id="cari"
                    placeholder="masukan"
                  />
                </div>
              </div>

              <br />
              <br />
              <br />

              <tr>
                <th>NP</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>username</th>
                <th>Password</th>
                <th>Aksi</th>
              </tr>
              <?php
                    $no = 1;
                    while ($user_data = mysqli_fetch_array($result)) {
                    ?>
              <tr>
                <td><?php echo $user_data['id_pengguna']; ?></td>
                <td><?php echo $user_data['nama_pengguna']; ?></td>
                <td><?php echo $user_data['nama_jabatan']; ?></td>
                <td><?php echo $user_data['username']; ?></td>
                <td><?php echo $user_data['pass']; ?></td>
                <td>
                            <center><a class='btn btn-success' href='admin_pegawai_edit.php?id_pegawai=<?= $user_data['id_pegawai']; ?>'>Edit</a> |
                                <a class='btn btn-danger' href='admin_pegawai_hapus.php?id_pegawai=<?= $user_data['id_pegawai']; ?>' onclick="return confirm('anda yakin ingin menghapus data?')">Delete</a>
                        </td>
              </tr>
              <?php
                    }
                    ?>
            </table>
          </td>
        </tr>

      </table>
    </div>
    <script src="./js/bootstrap.bundle.min.js"></script>
  </body>
</html>
