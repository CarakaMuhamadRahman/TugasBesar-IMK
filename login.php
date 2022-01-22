<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- custom css -->
    <link rel="stylesheet" href="style.css">    
  
    <title>Login | Waras</title>
  </head>
  <body>


    <!-- navbar -->
    <nav class="navbar navbar-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="landingpage.html">
            <img src="./img/logo_waras.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
            ꦮꦫꦱ
          </a>
        </div>
      </nav>
    <!-- navbar -->

    <!-- login -->
    <form method="post" action="cek_login1.php">
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="judul">Masuk ke akun anda</h1>
                    <input class="form-control username" type="text" name="username" placeholder="Masukkan Username">
                    <input class="form-control password" type="password" name="pass" placeholder="Masukkan Password">
                    <div class="login">
                        <input class="btn btn-primary btn-lg" type="submit" value="Login" />
                        <br>
                        <br>
                        <?php 
                          if(isset($_GET['pesan'])){
                              if($_GET['pesan']=="gagal"){
                                  echo "<div class='alert btn-danger'>Username dan Password tidak sesuai !</div>";
                              }
                          }
                       ?>

                      </div>
            <div class="row">
                <div class="col-sm-6">
                    <img src="./img/login.png" class="img-fluid foto" alt="...">
                </div>
            </div>
          </form>
        </div>
    </section>
      
    <!-- login -->

    <script src="./js/bootstrap.bundle.min.js"></script>

  </body>
</html>