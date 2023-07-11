<?php
    session_start();
    require 'koneksi/koneksi.php';
    include 'header.php';
    if(empty($_SESSION['USER']))
    {
        echo '<script>alert("Harap Login");window.location="index.php"</script>';
    }
    //dilakukan query untuk mendapatkan data transaksi dari tabel booking dan privat_jet dengan
    //menggunakan JOIN. Data tersebut disimpan dalam variabel $hasil.
    $hasil = $koneksi->query("SELECT privat_jet.merk, booking.* FROM booking JOIN privat_jet ON 
    booking.id_jet=privat_jet.id_jet ORDER BY id_booking DESC")->fetchAll();
?>

<!-- tampilan daftar transaksi yang menggunakan komponen-komponen dari Bootstrap. Terdapat sebuah
card yang menampilkan judul "Daftar Transaksi". Di dalam card tersebut, terdapat sebuah tabel yang
menampilkan data transaksi. Data tersebut diperoleh dari variabel "$hasil" yang berisi hasil query
sebelumnya. Setiap baris transaksi ditampilkan dalam sebuah elemen <tr> dan masing-masing kolomnya
ditampilkan dalam elemen <td>. Pada kolom aksi, terdapat tombol "Detail" yang mengarahkan pengguna
ke halaman bayar.php dengan mengirimkan parameter id dari kode booking. -->
<br>
<br>
<div class="container" >
    <div class="card col-12">
    <div class="card-header">
        Daftar Transaksi
    </div>
    <div class="card-body">
        <table class="table table-striped table-responsive table-bordered table-sm">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Kode Booking</th>
                    <th>Merk Jet</th>
                    <th>Nama </th>
                    <th>Tanggal Sewa </th>
                    <th>Lama Sewa </th>
                    <th>Total Harga</th>
                    <th>Konfirmasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php  $no=1; foreach($hasil as $isi){?>
                <tr>
                    <td><?php echo $no;?></td>
                    <td><?= $isi['kode_booking'];?></td>
                    <td><?= $isi['merk'];?></td>
                    <td><?= $isi['nama'];?></td>
                    <td><?= $isi['tanggal'];?></td>
                    <td><?= $isi['lama_sewa'];?> hari</td>
                    <td>Rp. <?= number_format($isi['total_harga']);?></td>
                    <td><?= $isi['konfirmasi_pembayaran'];?></td>
                    <td>
                        <a class="btn btn-primary" href="bayar.php?id=<?= $isi['kode_booking'];?>" 
                        role="button">Detail</a>   
                    </td>
                </tr>
                <?php $no++;}?>
            </tbody>
        </table>
    </div>
</div>

</div>



<!-- mengimpor file footer.php yang akan ditampilkan di bagian akhir halaman.-->
<?php include 'footer.php';?>

