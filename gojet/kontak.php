<?php
    session_start();
    require 'koneksi/koneksi.php';
    include 'header.php';
?>

<br>
<br>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-5 col-md-8 col-sm-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    Kontak Kami
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">Nama Rental</div>
                        <div class="col-sm-8"><?= $info_web->corp_name;?></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-4">Telp</div>
                        <div class="col-sm-8"><?= $info_web->tlp;?></div>
                    </div>
                
                    <div class="row mt-3">
                        <div class="col-sm-4">Alamat</div>
                        <div class="col-sm-8"><?= $info_web->alamat;?></div>
                    </div>
                
                    <div class="row mt-3">
                        <div class="col-sm-4">Email</div>
                        <div class="col-sm-8"><?= $info_web->email;?></div>
                    </div>
                
                    <div class="row mt-3">
                        <div class="col-sm-4">No Rekening</div>
                        <div class="col-sm-8"><?= $info_web->no_rek;?></div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>

<style>
    .container {
        min-height: 100%;
        position: relative;
    }

    .footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 60px; 
    }
</style>

<div class="footer mt-4 bg-dark text-white pt-3 pb-2">
      <div class="container">
        <p class="text-center mx-auto">Copyright <?= date('Y');?> <?= $info_web->corp_name;?> All Reserved</p>
      </div>
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>