<?php
require '../../koneksi/koneksi.php';
$title_web = 'Tambah Pesawat';
include '../header.php';
if (empty($_SESSION['USER'])) {
    session_start();
}

if ($_GET['aksi'] == 'tambah') {

    $allowedImageType = array("image/gif", "image/JPG", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", 'image/webp');
    $filepath = $_FILES['gambar']['tmp_name'];
    $fileSize = filesize($filepath);
    $fileinfo = finfo_open(FILEINFO_MIME_TYPE);
    $filetype = finfo_file($fileinfo, $filepath);
    $allowedTypes = [
        'image/png'   => 'png',
        'image/jpeg'  => 'jpg',
        'image/gif'   => 'gif',
        'image/jpg'   => 'jpeg',
        'image/webp'  => 'webp'
    ];
    if(!in_array($filetype, array_keys($allowedTypes))) {
        echo '<script>alert("You can only upload JPG, PNG and GIF file");window.location="tambah.php"</script>';
        exit();
    }else if ($_FILES['gambar']["error"] > 0) {
        echo '<script>alert("Error file");history.go(-1)</script>';
        exit();
    } elseif (!in_array($_FILES['gambar']["type"], $allowedImageType)) {
        echo '<script>alert("You can only upload JPG, PNG and GIF file");window.location="tambah.php"</script>';
        exit();
    } elseif (round($_FILES['gambar']["size"] / 1024) > 4096) {
        echo '<script>alert("WARNING !!! Besar Gambar Tidak Boleh Lebih Dari 4 MB !");window.location="tambah.php"</script>';
        exit();
    } else {
        $dir = '../../assets/image/';
        $tmp_name = $_FILES['gambar']['tmp_name'];
        $temp = explode(".", $_FILES["gambar"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        $target_path = $dir . basename($newfilename);
        if (move_uploaded_file($tmp_name, $target_path)) {
            $data[] = $_POST['no_seri'];
            $data[] = $_POST['merk'];
            $data[] = $_POST['harga'];
            $data[] = $_POST['deskripsi'];
            $data[] = $_POST['status'];
            $data[] = $newfilename;

            $sql = "INSERT INTO `privat_jet`(`no_seri`, `merk`, `harga`, `deskripsi`, `status`, `gambar`) 
                VALUES (?,?,?,?,?,?)";
            $row = $koneksi->prepare($sql);
            $row->execute($data);
            echo '<script>alert("sukses");window.location="pesawat.php"</script>';
        } else {
            echo '<script>alert("Harap Upload Gambar !");window.location="tambah.php"</script>';
        }
    }
}
if ($_GET['aksi'] == 'edit') {
    $id = $_GET['id'];
    $data = array(
        $_POST['no_seri'],
        $_POST['merk'],
        $_POST['harga'],
        $_POST['deskripsi'],
        $_POST['status']
    );

    // Cek apakah ada file yang diunggah
    if ($_FILES['gambar']['size'] > 0) {
        $allowedImageTypes = array("image/gif", "image/jpeg", "image/png", "image/webp");
        $filepath = $_FILES['gambar']['tmp_name'];
        $fileSize = filesize($filepath);
        $fileinfo = finfo_open(FILEINFO_MIME_TYPE);
        $filetype = finfo_file($fileinfo, $filepath);

        // Cek tipe file yang diunggah
        if (!in_array($filetype, $allowedImageTypes)) {
            echo '<script>alert("Anda hanya dapat mengunggah file JPG, PNG, dan GIF");window.location="tambah.php"</script>';
            exit();
        } elseif ($_FILES['gambar']["error"] > 0) {
            echo '<script>alert("Error file");history.go(-1)</script>';
            exit();
        } elseif (round($_FILES['gambar']["size"] / 1024) > 4096) {
            echo '<script>alert("WARNING !!! Besar Gambar Tidak Boleh Lebih Dari 4 MB !");history.go(-1)</script>';
            exit();
        } else {
            $dir = '../../assets/image/';
            $tmp_name = $_FILES['gambar']['tmp_name'];
            $temp = explode(".", $_FILES["gambar"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $target_path = $dir . basename($newfilename);

            // Pindahkan file yang diunggah ke direktori tujuan
            if (move_uploaded_file($tmp_name, $target_path)) {
                // Hapus gambar yang lama jika ada
                $gambar = $_POST['gambar'];
                if (file_exists('../../assets/image/'.$gambar)) {
                    unlink('../../assets/image/'.$gambar);
                }
                $data[] = $newfilename;
            } else {
                echo '<script>alert("Error file");history.go(-1)</script>';
                exit();
            }
        }
    } else {
        $data[] = $_POST['gambar_cek'];
    }

    $data[] = $id;
    $sql = "UPDATE privat_jet SET no_seri=?, merk=?, harga=?, deskripsi=?, status=?, gambar=? WHERE id_jet=?";
    $row = $koneksi->prepare($sql);
    $row->execute($data);

    echo '<script>alert("sukses");window.location="pesawat.php"</script>';
}


if (!empty($_GET['aksi'] == 'hapus')) {
    $id = $_GET['id'];
    $gambar = $_GET['gambar'];

    unlink('../../assets/image/'.$gambar);

    $sql = "DELETE FROM privat_jet WHERE id_jet = ?";
    $row = $koneksi->prepare($sql);
    $row->execute(array($id));

    echo '<script>alert("sukses hapus");window.location="pesawat.php"</script>';
}
