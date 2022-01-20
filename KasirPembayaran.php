<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <!-- custom css -->
    <link rel="stylesheet" href="kasir.css">  

    <title>WARAS</title>
  </head>
  <body>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: rgb(69, 98, 76);">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">
                <img src="img/logoo 1.png" alt="" width="55" height="55">
                ꦮꦫꦱ
              </a>
                <button class="btn" type="submit" style="background-color: rgb(255, 255, 255);">Kasir</button>
            </div>
          </nav>
          <br><br><br><br><br>

          <!-- jumbotron -->
      <div id="jumbotron">
          <div class="col-sm-12">
            <img src="./img/PKasir.png" class="img-fluid dashboard-Kasir" alt="...">
           
          </div>
      </div>
      <!-- jumbotron -->

      <!-- Tabel -->
      <div class="konten">
            <h1>Pembayaran</h1>
        </div>

        <div class="boxkasir1">
            <label>
            <div class="button1">
            <center><a href="#" class="btn1 btn-lg btn-block" style="text-decoration: none;">Print</a></center>
            </div>
                
            </label>
            <br>
            <br>
            <br>
            <br>
            <table class="table table-bordered table-active text-center">
                    <tr>
                        <th width=50>No Menu</th>
                        <th width=100>Nama Menu</th>
                        <th width=50>Harga</th>
                        <th width=50>Jumlah</th>
                        <th width=50>Total Harga</th>
                    </tr>
                    <?php
                    $no = 1;
                    while ($user_data = mysqli_fetch_array($result)) {
                        
                    ?>
            <p>Tanggal: <?php echo $user_data['Tanggal']; ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp No Meja: <?php echo $user_data['No_Meja']; ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp No Nota: <?php echo $no++?> </p>

                        <tr>
                            <td>
                                <center><?php echo $user_data['No_Menu']; ?></center>
                            </td>
                            <td>
                                <center><?php echo $user_data['nama_menu']; ?></center>
                            </td>
                            <td>
                                <center><?php echo $user_data['harga_menu']; ?></center>
                            </td>
                            <td>
                                <center><?php echo $user_data['Jumlah']; ?></center>
                            </td>
                            <td>
                                <center><?php echo $user_data['total']; ?></center>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
                
        </div>
    </div>  
     <!-- End Table -->               

      <!-- Footer -->
      <footer class="text-center text-dark mt-3 bt-2 pb-2"  style="background-color: white">
          Copyright © 2022 Catalyze Team    
      </footer> 
      <!-- Footer -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
  </body>
</html>
