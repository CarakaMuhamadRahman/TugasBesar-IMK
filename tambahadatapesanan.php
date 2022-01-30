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
        $result = mysqli_query($koneksi, "SELECT * FROM pesanan where no_order like'%" . $cari . "%'");
    } else {
        $result = mysqli_query($koneksi, "SELECT * FROM pesanan ORDER BY no_order ASC");
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
    <div class="container mt-5">
      <h3>Tambah data Pesanan</h3>
    </div>
    <?php 
                if(isset($_POST['tombol']))
                {
                    $no_order = $_POST['no_order'];
                    $jumlah = $_POST['jumlah'];
                    $status = $_POST['status'];
                    $no_menu = $_POST['no_menu'];
                    mysqli_query($koneksi,"insert into pesanan (no_order,jumlah,status,no_menu) values ('$no_order','$jumlah','$status','$no_menu')");
                    header("location:pesan_pelayan.php");
                  }                   
                
            ?>
    <div class="container border border-1 mt-4">
      <form method="POST">
        <div class="mt-3 row">
          <label for="inputNP" class="col-sm-2 col-form-label">no order</label>
          <div class="col-sm-10">
            <input type="text" class="form-control"  name="no_order" />
          </div>
        </div>
        <div class="mt-3 row">
          <label for="inputNP" class="col-sm-2 col-form-label">jumlah</label>
          <div class="col-sm-10">
            <input type="text" class="form-control"  name="jumlah" />
          </div>
        </div>
        <div class="mt-3 row">
          <label for="inputNP" class="col-sm-2 col-form-label">status</label>
          <div class="col-sm-10">
            <input type="text" class="form-control"  name="status"/>
          </div>
        </div>
        <div class="mt-3 row">
          <label for="inputNP" class="col-sm-2 col-form-label">Menu</label>
          <div class="col-sm-10">
          <select name="no_menu" >
                <option disabled selected> Pilih </option>
              <?php 
                $sql=mysqli_query($koneksi, "SELECT * FROM menu ");

                while ($data=mysqli_fetch_array($sql)) {
              ?>
                <option value="<?=$data['no_menu']?>"><?=$data['nama_menu']?></option> 
              <?php
                }
              ?>
                </select>
          </div>
        </div>
        <td><input class="btn-outline-warning" type="submit" name="tombol" value="Tambah"></td>
        <!-- <button type="submit" class="btn btn-success mb-3">Simpan</button> -->
      </form>
    </div>
    <script src="./js/bootstrap.bundle.min.js"></script>
  </body>
</html>
