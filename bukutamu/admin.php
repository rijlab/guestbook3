<?php
include 'function.php';

//Cek session
// if(isset($_GET['code'])){
//     if(isset($_SESSION['user'])){
        
//     } else {
//         $_SESSION['user'] = 'True';
//     }
// } else {
//     if(isset($_SESSION['user'])){
        
//     } else {
//         header('location:login.html');
//     }
// }

if(isset($_SESSION['user'])){
        
} else {
    header('location:login.html');
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
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <title>View GuestBook</title>
  </head>


  <body class="bg-dark text-light">

    <nav class="navbar navbar-expand-lg navbar-light bg-warning p-4">
    <a class="navbar-brand" href="#"><strong>Company X</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item active">
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
            <h1 class="display-4"><strong>Halaman Admin</strong></h1>
            <hr>
            <p class="mt-4">Berikut adalah tamu yang tercatat.</p>
        </div>
    </div>

    <div class="container p-4 bg-light">
        <table id="example1" class="table table-bordered table-hovered mt-4">
            <thead>
            <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Asal Perusahaan</th>
            <th>Kepentingan</th>
            <th>Tanggal Submit</th>
            </tr>
            </thead>
            <tbody>

            <?php

            $get_guest = mysqli_query($conn,"SELECT * FROM guest");
            $i = 1;
            while($guest=mysqli_fetch_array($get_guest)){
            
            //Fetch Data
            $guest_nama = $guest['nama'];
            $guest_telp = $guest['telp'];
            $guest_email = $guest['email'];
            $guest_perusahaan = $guest['perusahaan'];
            $guest_kepentingan = $guest['kepentingan'];
            $guest_date = $guest['date'];

            //Decrypt Data
            $nama = decryptthis($guest_nama,$key);
            $telp = decryptthis($guest_telp,$key);
            $email = decryptthis($guest_email,$key);
            $perusahaan = decryptthis($guest_perusahaan,$key);
            $kepentingan = decryptthis($guest_kepentingan,$key);

            ?>

                <tr>
                <td><?=$i++;?></td>
                <td><?=$nama;?></td>
                <td><?=$telp;?></td>
                <td><?=$email;?></td>
                <td><?=$perusahaan;?></td>
                <td><?=$kepentingan;?></td>
                <td><?=$guest_date;?></td>
                </tr>
            
            <?php
            }
            ?>


            </tbody>
        </table>
    </div>

    


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- DataTables  & Plugins -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

  </body>

  <script>
        $(document).ready(function() {
            $('#example1').DataTable();
        } );
    </script>
</html>