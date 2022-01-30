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
$id_pengguna = $_GET['id_pengguna'];
// Fetech user data based on id
$result = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id_pengguna='$id_pengguna'");

while ($user_data = mysqli_fetch_array($result)) {

    $nama_pengguna = $user_data['nama_pengguna'];
    $username = $user_data['username'];
    $jabatan = $user_data['jabatan'];
    $pass = $user_data['pass'];
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
      <h3>Ubah Data Pegawai</h3>
    </div>
    <div class="container border border-1 mt-4">
      <form method="post" action="">
        <div class="mt-3 row">
          <label for="inputNP" class="col-sm-2 col-form-label">NP</label>
          <div class="col-sm-10">
          <input type="text" class="form-control" name="id_pengguna" value="<?php echo $id_pengguna; ?>" disabled>
          </div>
        </div>
        <div class="mt-3 row">
          <label for="inputNP" class="col-sm-2 col-form-label">Nama</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputPassword"  name="nama_pengguna" value="<?php echo $nama_pengguna; ?>" />
          </div>
        </div>
        <div class="mt-3 row">
            <label for="inputNP" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
              <input type="text" class="form-control"  name="username" value="<?php echo $username; ?>"/>
            </div>
          </div>
        <div class="mt-3 mb-3 row">
          <label for="inputNP" class="col-sm-2 col-form-label">Jabatan</label>
          <div class="col-sm-10">
          <input type="text" class="form-control"  name="jabatan" value="<?php echo $jabatan; ?>"/>
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
                                    $nama_pengguna = $_POST['nama_pengguna'];
                                    $username = $_POST['username'];
                                    $jabatan = $_POST['jabatan'];

                                    // update user data
                                    $result = mysqli_query($koneksi, "UPDATE `pengguna` SET `id_pengguna`='$id_pengguna',`nama_pengguna`='$nama_pengguna',`username`='$username',`jabatan`='$jabatan' WHERE `id_pengguna`='$id_pengguna'");

                                    // Redirect to homepage to display updated user in list
                                    header("Location: keloladatapengguna.php");
                                }                   
                                
                            ?>
      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <script src="./js/bootstrap.bundle.min.js"></script>
  </body>
</html>
