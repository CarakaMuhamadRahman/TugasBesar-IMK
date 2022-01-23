<?php 
include_once("koneksi.php");

	session_start();
	// cek apakah yang mengakses halaman ini sudah login
	if (!isset($_SESSION['nama_pengguna'])) {
        header('location:login.php?pesan=gagal');
    }
	?>
<?php
// Display selected user data based on id
// Getting id from url
$id_order = $_GET['id_order'];
// Fetech user data based on id
$result = mysqli_query($koneksi, "SELECT * FROM pesanan WHERE id_order='$id_order'");

while ($user_data = mysqli_fetch_array($result)) {

    $jumlah = $user_data['jumlah'];
    $status = $user_data['status'];
    $id_pengguna = $user_data['id_pengguna'];
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

    <title>Koki | Waras</title>
    <?php
    include_once("koneksi.php");

    if (isset($_GET['cari'])) {
        $cari = $_GET['cari'];
        $result = mysqli_query($koneksi, "SELECT * FROM pesanan where id_order like'%" . $cari . "%'");
    } else {
        $result = mysqli_query($koneksi, "SELECT * FROM pesanan ORDER BY id_order ASC");
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
      <h3>Ubah Data Pesanan</h3>
    </div>
    <div class="container border border-1 mt-4">
      <form method="post" action="">
        <div class="mt-3 row">
          <label for="inputNP" class="col-sm-2 col-form-label">Id Order</label>
          <div class="col-sm-10">
          <input type="text" class="form-control" name="id_order" value="<?php echo $id_order; ?>" disabled>
          </div>
        </div>
        <div class="mt-3 row">
          <label for="inputNP" class="col-sm-2 col-form-label">Jumlah</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputPassword"  name="jumlah" value="<?php echo $jumlah; ?>" disabled>
          </div>
        </div>
        <div class="mt-3 row">
            <label for="inputNP" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
              <input type="text" class="form-control"  name="status" value="<?php echo $status; ?>"/>
            </div>
          </div>
        <div class="mt-3 mb-3 row">
          <label for="inputNP" class="col-sm-2 col-form-label">Id Pengguna</label>
          <div class="col-sm-10">
          <input type="text" class="form-control"  name="id_pengguna" value="<?php echo $id_pengguna; ?>" disabled>
          </div>
        </div>

        <style>
            .btn-success {
              width: 300px;
            }
            </style>
        <center>
        <input class="btn btn-success" type="submit" name="update" value="update"></td>
        </center>
        <?php 
                                if(isset($_POST['update']))
                                {
                                    $jumlah = $_POST['jumlah'];
                                    $status = $_POST['status'];
                                    $id_pengguna = $_POST['id_pengguna'];

                                    // update user data
                                    $result = mysqli_query($koneksi, "UPDATE `pesanan` SET  `status`='$status' WHERE `id_order`='$id_order'");

                                    // Redirect to homepage to display updated user in list
                                    header("Location: kelolaPesanan_Koki.php");
                                }                   
                                
                            ?>
      </form>
    </div>
    <script src="./js/bootstrap.bundle.min.js"></script>
  </body>
</html>
