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

<script type="text/javascript" src="ckeditor/ckeditor.js"></script>

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

	<?php
	$edit=mysqli_query($koneksi,"SELECT * FROM event where id_event ='$_GET[id]'");
    $hasil = mysqli_fetch_array($edit);
	  $id_event = $hasil['id_event'];
    $judul_event = $hasil['judul_event'];
    $keterangan_event = $hasil['keterangan_event'];
    $tanggal_event = $hasil['tanggal_event'];
    $lokasi_event = $hasil['lokasi_event'];
    $foto_event = $hasil['foto_event'];
	?>

  <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h4 class="font-weight-bold text-primary">Edit Event</h4>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="card-body">
            <form enctype='multipart/form-data' action="aksi_edit_event.php" method="POST">
            <input type="hidden" name="id_event" value="<?php echo $id_event; ?>"/>
              <div class="box-body">

              <div class="form-group">
                  <label>Judul Event </label>
                  <input value="<?php echo $judul_event; ?>" name="judul_event" type="text" class="form-control" placeholder="Masukkan Judul Event (jika kosong masukan '-')" required>
                </div>

                <div class="form-group">
                  <label>Keterangan Event </label>
                  <input value="<?php echo $keterangan_event; ?>" name="keterangan_event" type="text" class="form-control" placeholder="Masukkan Keterangan Event (jika kosong masukan '-')" required>
                </div>

                <div class="form-group">
                  <label>Tanggal Event</label>
                  <input value="<?php echo $tanggal_event; ?>" name="tanggal_event" type="date" class="form-control"  required>
                </div>

                <div class="form-group">
                  <label>Lokasi Event </label>
                  <input value="<?php echo $lokasi_event; ?>" name="lokasi_event" type="text" class="form-control" placeholder="Masukkan Lokasi Event (jika kosong masukan '-')" required>
                </div>
				        
				        <div class="form-group">
                  <label>Foto Event</label>
                  <input type="file" name="foto_event" id="foto_event" value="<?php echo $foto_event; ?>" required>
                </div>


                <div class="form-actions">
                    <button type="submit" name="update" class="btn btn-primary"><i class="fa fa-save"></i>  Simpan</button>
                </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        </div>
        <!--/.col (right) -->
</section>

      </div>
      <!-- End of Main Content -->

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