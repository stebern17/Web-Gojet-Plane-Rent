<?php
    require '../../koneksi/koneksi.php';
    $title_web = 'Edit Pesawat';
    include '../header.php';
    if(empty($_SESSION['USER']))
    {
        session_start();
    }
    $id = $_GET['id'];

    $sql = "SELECT * FROM privat_jet WHERE id_jet =  ?";
    $row = $koneksi->prepare($sql);
    $row->execute(array($id));

    $hasil = $row->fetch();
?>


<br>
<div class="container">
    <div class="card">
        <div class="card-header text-white bg-primary">
            <h4 class="card-title">
                Edit Pesawat - <?= $hasil['merk'];?>
                <div class="float-right">
                    <a class="btn btn-warning" href="pesawat.php" role="button">Kembali</a>
                </div>
            </h4>
        </div>
        <div class="card-body">
            <div class="container">
                <form method="post" action="proses.php?aksi=edit&id=<?= $id;?>" enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-sm-6">

                            <div class="form-group row">
                                <label class="col-sm-3">No Lambung</label>
                                <input type="text" class="form-control col-sm-9" value="<?= $hasil['no_seri'];?>" name="no_seri" placeholder="Isi No Seri">
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3">Merk Pesawat</label>
                                <input type="text" class="form-control col-sm-9"  value="<?= $hasil['merk'];?>" name="merk" placeholder="Isi Merk">
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3">Harga</label>
                                <input type="text" class="form-control col-sm-9"  value="<?= $hasil['harga'];?>" name="harga" placeholder="Isi Harga">
                            </div>

                        </div>

                        <div class="col-sm-6">

                            <div class="form-group row">
                                <label class="col-sm-3">Deskripsi</label>
                                <input type="text" class="form-control col-sm-9"  value="<?= $hasil['deskripsi'];?>" name="deskripsi" placeholder="Isi Deskripsi">
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3">Status</label>
                                <select class="form-control col-sm-9" name="status">
                                    <option value="" disabled selected>Pilih Status</option>
                                    <option <?php if($hasil['status'] == 'Tersedia'){ echo 'selected';}?>>Tersedia</option>
                                    <option  <?php if($hasil['status'] == 'Tidak Tersedia'){ echo 'selected';}?>>Tidak Tersedia</option>
                                </select>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3">Gambar</label>
                                <input type="file" accept="image/*" class="form-control col-sm-9" id="file-input" name="gambar" value="../../assets/image/<?= $hasil['gambar'];?>"  placeholder="Isi Gambar">
                               
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3">Penampakan</label>
                                <img src="../../assets/image/<?php echo $hasil['gambar'];?>" class="img-fluid" style="width:200px;">                               
                            </div>
                            <input type="text" hidden value="<?php echo $hasil['gambar'];?>" name="gambar_cek">
                        </div>
                    </div>
                    <hr>
                    <div class="float-right">
                        <button class="btn btn-primary" role="button" type="submit">
                            Simpan
                        </button>
                    </div>
                </form>       
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
  var defaultFilePath = "../../assets/image/<?php echo $hasil['gambar'];?>" 
  var fileInput = document.getElementById('file-input');
  fileInput.value = defaultFilePath;
    })
</script>
<?php  include '../footer.php';?>