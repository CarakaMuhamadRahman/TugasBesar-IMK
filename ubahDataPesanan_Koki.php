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
$no_order = $_GET['no_order'];
// Fetech user data based on id
$result = mysqli_query($koneksi, "SELECT no_order, jumlah, status, nama_menu FROM pesanan, menu WHERE pesanan.no_menu=menu.no_menu AND no_order='$no_order'");

while ($user_data = mysqli_fetch_array($result)) {

    $jumlah = $user_data['jumlah'];
    $status = $user_data['status'];
    $nama_menu = $user_data['nama_menu'];
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
        $result = mysqli_query($koneksi, "SELECT id_order, no_order, jumlah, status, nama_menu FROM pesanan, menu WHERE pesanan.no_menu=menu.no_menu like'%" . $cari . "%'");
    } else {
        $result = mysqli_query($koneksi, "SELECT id_order, no_order, jumlah, status, nama_menu FROM pesanan, menu WHERE pesanan.no_menu=menu.no_menu");
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
          <label for="inputNP" class="col-sm-2 col-form-label">No Order</label>
          <div class="col-sm-10">
          <input type="text" class="form-control" name="no_order" value="<?php echo $no_order; ?>" disabled>
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
          <div class="mt-3 mb-4 row">
            <label for="inputNP" class="col-sm-2 col-form-label">Nama Menu</label>
            <div class="col-sm-10">
              <input type="text" class="form-control"  name="nama_menu" value="<?php echo $nama_menu; ?>" disabled>
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
                                    $nama_menu = $_POST['nama_menu'];
                                    $id_pengguna = $_POST['id_pengguna'];

                                    // update user data
                                    $result = mysqli_query($koneksi, "UPDATE `pesanan` SET  `status`='$status' WHERE `no_order`='$no_order'");

                                    // Redirect to homepage to display updated user in list
                                    header("Location: kelolaPesanan_Koki.php");
                                }                   
                                
                            ?>
      </form>
    </div>
    <script src="./js/bootstrap.bundle.min.js"></script>
  </body>
</html>
