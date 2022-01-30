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
        $result = mysqli_query($koneksi, "SELECT * FROM pengguna ORDER BY nama_pengguna ASC");
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
        <div class="dropdown mr-5">
                <a class="btn btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                <?php echo $_SESSION['nama_pengguna'] ?>
                </a>

              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
            </div>
      </div>
    </nav>
    <div class="container mt-5">
      <h3>Tambah data pengguna</h3>
    </div>
    <?php 
                if(isset($_POST['tombol']))
                {
                    $id_pengguna = $_POST['id_pengguna'];
                    $nama_pengguna = $_POST['nama_pengguna'];
                    $username = $_POST['username'];
                    $jabatan = $_POST['jabatan'];
                    $pass = md5($_POST['pass']);
                    mysqli_query($koneksi,"insert into pengguna (id_pengguna,nama_pengguna,username,jabatan,pass) values ('$id_pengguna','$nama_pengguna','$username','$jabatan','$pass')");
                    header("location:keloladatapengguna.php");
                  }                   
                
            ?>
    <div class="container border border-1 mt-4">
      <form method="POST">
        <div class="mt-3 row">
          <label for="inputNP" class="col-sm-2 col-form-label">NP</label>
          <div class="col-sm-10">
            <input type="text" class="form-control"  name="id_pengguna" />
          </div>
        </div>
        <div class="mt-3 row">
          <label for="inputNP" class="col-sm-2 col-form-label">Nama</label>
          <div class="col-sm-10">
            <input type="text" class="form-control"  name="nama_pengguna" />
          </div>
        </div>
        <div class="mt-3 row">
          <label for="inputNP" class="col-sm-2 col-form-label"
            >username</label
          >
          <div class="col-sm-10">
            <input type="text" class="form-control"  name="username"/>
          </div>
        </div>
        <div class="mt-3 row">
          <label for="inputNP" class="col-sm-2 col-form-label">Jabatan</label>
          <div class="col-sm-10">
            <!-- <input type="text" class="form-control"  /> -->
            <select name="jabatan">
              <option disabled selected>-- Select Jabatan --</option>
              <option value="Admin">Admin</option>
              <option value="Kasir">Kasir</option>
              <option value="Koki">Koki</option>
              <option value="Pelayan">Pelayan</option>
            </select>
          </div>
        </div>
        <div class="mt-3 mb-3 row">
          <label for="inputPassword" class="col-sm-2 col-form-label"
            >Password</label
          >
          <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword" name="pass"/>
          </div>
        </div>
        <td><input class="btn-outline-warning" type="submit" name="tombol" value="Tambah"></td>
        <!-- <button type="submit" class="btn btn-success mb-3">Simpan</button> -->
      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <script src="./js/bootstrap.bundle.min.js"></script>
  </body>
</html>
