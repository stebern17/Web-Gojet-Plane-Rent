<?php
 require '../../koneksi/koneksi.php';

if($_GET['id'] == 'konfirmasi')
{
    $data2[] = $_POST['status'];
    $data2[] = $_POST['id_jet'];
    $sql2 = "UPDATE `privat_jet` SET `status`= ? WHERE id_jet= ?";
    $row2 = $koneksi->prepare($sql2);
    $row2->execute($data2);

    echo '<script>alert("Status Pesawat di pinjam");history.go(-1);</script>'; 
}