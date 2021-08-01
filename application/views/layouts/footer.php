
  </div>
  <footer>
    <span>SIWIKODE <?=date("Y")?></span>
  </footer>
  <!-- Bootstrap core JavaScript -->
  <script src="<?=base_url()?>assets/js/IMPORTANT.js?v="<?=time()?>></script>
  <script src="<?=base_url()?>assets/js/ourFunctions.js?v="<?=time()?>></script>
  <script src="<?=base_url()?>assets/js/dom.js?v="<?=time()?>></script>
  <script src="<?=base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
  <script src="<?=base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
  <script src="<?=base_url('assets/js/sweetalert2.all.min.js')?>"></script>
  <script src="<?=base_url('assets/js/custom.js')?>"></script>
  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
      
    });
  </script>

</body>

</html>