<?php 
$user = 'root';
$pass = '';

   $koneksi = new PDO("mysql:host=localhost;dbname=gojet", $user, $pass);

    global $url;
    $url = "http://localhost/gojet/";

    $sql_web = "SELECT * FROM infoweb WHERE id = 1";
    $row_web = $koneksi->prepare($sql_web);
    $row_web->execute();
    global $info_web;
    $info_web = $row_web->fetch(PDO::FETCH_OBJ);
?>