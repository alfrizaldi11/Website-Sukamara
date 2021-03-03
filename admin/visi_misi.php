<?php 
include '../config/koneksi.php';
session_start();
if (empty ($_SESSION['username']) AND empty ($_SESSION['mypassword']) ){
  echo "<script> alert('Anda harus login terlebih dahulu');
  window.location = '../login.php'</script>";
}
if($_SESSION['level']!="admin_master" AND ($_SESSION['level']!="admin")){
  die("404 Not Found");
}


?>

<!DOCTYPE html>
<html lang="en">

<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

<?php
include 'head.php';

?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

  <?php
include 'sidebar.php';

?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

      <?php
include 'topbar.php';

?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

        <section class="content-header">
      
     
    </section>
  <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h4 class="font-weight-bold text-primary">Visi dan Misi</h4>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="card-body">

            <?php
                $edit=mysqli_query($koneksi,"SELECT * from visi_misi");
                $hasil = mysqli_fetch_array($edit);
                
                $isi_visimisi = $hasil['isi_visimisi'];
              ?>

            <form role="form" action="aksi_edit_visimisi.php" method="POST">
              <div class="box-body">
                    <div class="form-group">
                      <label>Isi Visi dan Misi</label>
                      <textarea name="isi_visimisi"  class="ckeditor" required> <?php echo $isi_visimisi; ?></textarea>
                    </div>

                    <div class="form-actions">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>  Simpan</button>
                                        
                    </div>
            </form>
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
</section>
<br>

        
</div>

      <?php
include 'footer.php';

?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <?php
        include 'logout_modals.php';

    ?>

  <script>CKEDITOR.replace( 'isi_visimisi' );</script>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>