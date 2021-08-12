<?php
include 'function.php';


//Cek session
if(isset($_GET['auth'])){
        $_SESSION['user'] = 'True';
        header('location:index.php');
} else {
    if(isset($_SESSION['user'])){
        
    } else {
        header('location:login.html');
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>GuestBook App</title>
  </head>


  <body class="bg-dark">

    <nav class="navbar navbar-expand-lg navbar-light bg-warning p-4">
    <a class="navbar-brand" href="#"><strong>Company X</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="admin.php">Admin</a>
        </li>
        <?php
        if(isset($_SESSION['user'])){
            echo '
            <li class="nav-item">
            <a class="nav-link" href="loggedout.php">Logout</a>
        </li>';
        }
        ?>
        </ul>
    </div>
    </nav>

    <!--Isi nya nih-->
    <div class="jumbotron jumbotron-fluid pl-4 pr-4 bg-dark text-light">
        <div class="container">
            <h1 class="display-4"><strong>Selamat Datang</strong></h1>
            <p class="lead">di Aplikasi GuestBook Company X.</p>
            <hr>
            <p class="mt-4">Setiap tamu agar mengisi data dengan benar.</p>
            <hr>
        </div>
    </div>

    <div class="container mb-4 text-light">
        <form method="post">

        <div class="row">
            <div class="col">
                Nama Lengkap
            </div>
            <div class="col">
                <input type="text" name="nama" class="form-control" required autofocus>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                No Handphone
            </div>
            <div class="col">
                <input type="number" name="telp" class="form-control" required>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                Email
            </div>
            <div class="col">
                <input type="email" name="email" class="form-control" required>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                Asal Perusahaan
            </div>
            <div class="col">
                <input type="text" name="perusahaan" class="form-control" required>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                Kepentingan
            </div>
            <div class="col">
                <textarea name="kepentingan" cols="30" rows="3" class="form-control"></textarea>
            </div>
        </div>

        <div align="right" class="mt-4"><button type="submit" name="kirim" class="btn btn-warning">Kirim</button></div>

        </form>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>