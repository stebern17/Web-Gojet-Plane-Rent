
<?php
require('koneksi/koneksi.php'); //mengimpor file koneksi.php yang diperlukan untuk menghubungkan ke database
?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>gojet</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!--ini merupakan awal dari halaman HTML. Di dalamnya terdapat tag <head>
        yang mendefinisikan judul halaman, meta tag untuk pengaturan tampilan halaman,
        dan tautan ke file CSS Bootstrap dan CSS lainnya.-->
    <link rel="stylesheet" href="assets/css/bootstrap.css" >
    <link rel="stylesheet" href="assets/css/font-awesome.css" >
    <link rel="stylesheet" href="assets/css/main.css">
  </head>

  <body>
  
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">
        <div class="d-flex align-items-center">
            <h2 style="display: inline-block; margin-right: 10px;"><b style="text-transform: uppercase;"><?= $info_web->corp_name; ?></b></h2>
            <img src="assets/image/LOGO_CORP.png" class="logo-corp" alt="logo" style="display: inline-block;">
        </div>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link ml-2" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link ml-2" href="blog.php">Daftar Pesawat</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link ml-2" href="kontak.php">Kontak Kami</a>
            </li>
            <?php if (!empty($_SESSION['USER'])) { ?>
                <li class="nav-item active">
                    <a class="nav-link ml-2" href="history.php">History</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link ml-2" href="profil.php">Profil</a>
                </li>
            <?php } ?>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="get" action="blog.php">
            <input class="form-control mr-sm-2" type="search" name="cari" placeholder="Cari Nama Pesawat" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <?php if (!empty($_SESSION['USER'])) { ?>
            <ul class="navbar-nav ml-2">
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="fa fa-user"></i> Hallo, <?php echo $_SESSION['USER']['nama_pengguna']; ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="return confirm('Apakah anda ingin logout ?');" href="<?php echo $url; ?>admin/logout.php">Logout</a>
                </li>
            </ul>
        <?php } ?>
    </div>
</nav>

