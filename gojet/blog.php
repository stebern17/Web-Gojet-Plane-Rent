<?php
    session_start(); // Memulai session PHP
    require 'koneksi/koneksi.php'; // Mengimpor file koneksi.php
    include 'header.php'; // Mengimpor file header.php
    if($_GET['cari'] ?? null) // Memeriksa apakah parameter GET 'cari' ada
    {
        $cari = strip_tags($_GET['cari']); // Mengambil nilai dari parameter 'cari' dan membersihkannya dari tag HTML yang tidak diinginkan
        
        $query =  $koneksi->query('SELECT * FROM privat_jet WHERE merk LIKE "%'.$cari.'%" ORDER BY id_jet DESC')->fetchAll(); // Melakukan query untuk mendapatkan data privat_jet yang memiliki merk yang mengandung kata kunci yang diberikan dan mengambil semua baris hasil query
    }
    else
    {
        $query =  $koneksi->query('SELECT * FROM privat_jet ORDER BY id_jet DESC')->fetchAll(); // Jika parameter 'cari' tidak ada, maka melakukan query untuk mendapatkan semua data privat_jet dan mengambil semua baris hasil query
    }
?>

<!-- Bagian tampilan HTML -->
<br>
<br>
<div class="container mb-4">
<div class="row mb-4">
    <div class="col-sm-12">
        <?php 
            if($_GET['cari'] ?? null) // Memeriksa apakah parameter GET 'cari' ada
            {
                echo '<h4> Keyword Pencarian : '.$cari.'</h4>'; // Menampilkan kata kunci pencarian jika parameter 'cari' ada
            }
            else
            {
                echo '<h4> Semua Pesawat</h4>'; // Menampilkan judul "Semua Pesawat" jika parameter 'cari' tidak ada
            }
        ?>
        <div class="row mt-3">
        <?php 
            $no =1;
            foreach($query as $isi)
            {
        ?>
            <div class="col-sm-4">
                <div class="card">
                <img src="assets/image/<?php echo $isi['gambar'];?>" class="card-img-top" style="height:200px;object-fit:cover;">
                    <div class="card-body" style="background:#ddd">
                        <h5 class="card-title"><?php echo $isi['merk'];?></h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php if($isi['status'] == 'Tersedia'){?>
                            <li class="list-group-item bg-primary text-white">
                                <i class="fa fa-check"></i> Available
                            </li>
                        <?php }else{?>
                            <li class="list-group-item bg-danger text-white">
                                <i class="fa fa-close"></i> Not Available
                            </li>
                        <?php }?>
                        <li class="list-group-item bg-info text-white"><i class="fa fa-check"></i> Free Maintenance</li>
                        <li class="list-group-item bg-dark text-white">
                            <i class="fa fa-money"></i> Rp. <?php echo number_format($isi['harga']);?>/ day
                        </li>
                    </ul>
                    <div class="card-body">
                        <center>
                            <a href="booking.php?id=<?php echo $isi['id_jet'];?>" class="btn btn-success">Booking now!</a>
                            <a href="detail.php?id=<?php echo $isi['id_jet'];?>" class="btn btn-info">Detail</a>
                        </center>
                    </div>
                </div>
            </div>
            <?php $no++;}?>
        </div>
    </div>
</div>
</div>


<?php include 'footer.php';?>