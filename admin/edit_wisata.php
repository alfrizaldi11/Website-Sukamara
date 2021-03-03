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
	$edit=mysqli_query($koneksi,"SELECT * FROM wisata where id_wisata ='$_GET[id]'");
	$hasil = mysqli_fetch_array($edit);
	$id_wisata = $hasil['id_wisata'];
	$nama_wisata = $hasil['nama_wisata'];
	$keterangan_wisata = $hasil['keterangan_wisata'];
	$lokasi_wisata = $hasil['lokasi_wisata'];
	$foto_wisata = $hasil['foto_wisata'];

	
	?>

  <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h4 class="font-weight-bold text-primary">Edit Wisata</h4>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="card-body">
            <form enctype='multipart/form-data' action="aksi_edit_wisata.php" method="POST">
            <input type="hidden" name="id_wisata" value="<?php echo $id_wisata; ?>"/>
              <div class="box-body">
                <div class="form-group">
                  <label>Nama Wisata</label>
                  <input value="<?php echo $nama_wisata; ?>" name="nama_wisata" type="text" class="form-control" placeholder="Masukkan nama wisata (jika kosong masukan '-')" required>
                </div>
                
                <div class="form-group">
                  <label>Keterangan Wisata</label>
                  <input value="<?php echo $keterangan_wisata; ?>" name="keterangan_wisata" type="text" class="form-control" placeholder="Masukkan keterangan wisata(jika kosong masukan '-')" required>
                </div>

                <div class="form-group">
                  <label>Lokasi Wisata</label>
                  <input value="<?php echo $lokasi_wisata; ?>" name="lokasi_wisata" type="text" class="form-control" placeholder="Masukkan lokasi wisata(jika kosong masukan '-')" required>
                </div>
				        
				        <div class="form-group">
                  <label>Foto Wisata</label>
                  <input type="file" name="foto_wisata" id="foto_wisata" value="<?php echo $picture; ?>" required>
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