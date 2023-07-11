    <div class="footer mt-4 bg-dark text-white pt-3 pb-2">
      <div class="container">
      <p class="text-center mx-auto">Copyright <?= date('Y');?> <?= $info_web->corp_name;?> All Reserved</p> 
      </div>
    </div>
    <script src="<?php echo $url;?>assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo $url;?>assets/js/bootstrap.min.js"></script>
    <script>
    function adjustFooterPosition() {
        const containerHeight = document.querySelector('.container').offsetHeight;
        const windowHeight = window.innerHeight;
        const footer = document.querySelector('.footer');
        
        if (containerHeight < windowHeight) {
            footer.style.position = 'absolute';
        } else {
            footer.style.position = 'relative';
        }
    }

    window.addEventListener('load', adjustFooterPosition);
    window.addEventListener('resize', adjustFooterPosition);
</script>
    
    
  </body>
</html>