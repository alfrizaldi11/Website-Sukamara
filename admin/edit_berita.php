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

<script src="https://cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>

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
	$edit=mysqli_query($koneksi,"SELECT * FROM berita where id_berita ='$_GET[id]'");
    $hasil = mysqli_fetch_array($edit);
    $id_berita = $hasil['id_berita'];
    $judul_berita = $hasil['judul_berita'];
    $tanggal_berita = $hasil['tanggal_berita'];
    $spoiler_berita = $hasil['spoiler_berita'];
    $tanggal_posting = $hasil['tanggal_posting'];
    $isi_berita = $hasil['isi_berita'];
    $foto_berita = $hasil['foto_berita'];
	?>

  <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h4 class="font-weight-bold text-primary">Edit Berita</h4>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="card-body">
            <form enctype='multipart/form-data' action="aksi_edit_berita.php" method="POST">
            <input type="hidden" name="id_berita" value="<?php echo $id_berita; ?>"/>
              <div class="box-body">

              <div class="form-group">
                  <label>Judul Berita</label>
                  <input value="<?php echo $judul_berita; ?>" name="judul_berita" type="text" class="form-control" placeholder="Masukkan Judul Berita (jika kosong masukan '-')" required>
              </div>

              <div class="form-group">
                  <label>Tanggal Berita</label>
                  <input value="<?php echo $tanggal_berita; ?>" name="tanggal_berita" type="date" class="form-control" required>
              </div>

              <div class="form-group">
                  <label>Spoier Berita</label>
                  <input value="<?php echo $spoiler_berita; ?>" name="spoiler_berita" type="text" class="form-control" placeholder="Masukkan Spoiler Berita (jika kosong masukan '-')" required>
              </div>

              <div class="form-group">
                  <label>Tanggal Posting Berita</label>
                  <input value="<?php echo $tanggal_posting; ?>" name="tanggal_posting" type="date" class="form-control" required>
              </div>

              <div class="form-group">
                      <label>Isi Berita</label>
                      <textarea name="isi_berita"  class="ckeditor" required> <?php echo $isi_berita; ?></textarea>
              </div>
				        
			  <div class="form-group">
                  <label>Foto Berita</label>
                  <input type="file" name="foto_berita" id="foto_berita" value="<?php echo $foto_berita; ?>" required>
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

  <script>CKEDITOR.replace( 'isi_berita' );</script>
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