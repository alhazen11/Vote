
  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <!-- Default to the left -->
    <strong>Copyright &copy; 2020 - <a href="https://hmikup.com/">Himpunan Mahasiswa Ilmu Komputer - Universitas Pertamina</a>.</strong> All rights reserved.
  </footer>

 
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="<?=base_url()?>bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?=base_url()?>bower_components/jquery.confirm.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>js/bootstrap-datepicker.min.js"></script>
<script src="<?=base_url()?>js/adminlte.min.js"></script>
<?php if($js_index!=null){ 
      include $_SERVER['DOCUMENT_ROOT']."/vote/js/pages/".$js_index;
    }
?>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>