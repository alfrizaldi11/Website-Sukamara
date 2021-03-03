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




$data_berita = mysqli_query($koneksi,"SELECT * FROM berita order by id_berita DESC");

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
    <section class="content">
                <div class="row">
                <div class="col-md-12">
                  <!-- general form elements -->
                          <div class="card shadow mb-4">
                            <div class="card-header py-3">
                              <h4 class="font-weight-bold text-primary">Berita</h4>
                            </div>
                                 <div class="card-body">
                                    <form enctype='multipart/form-data' action="aksi_tambah_berita.php" method="POST"  id="form_tambah_berita">

                                          <div class="form-group">
                                              <label>Judul Berita</label>
                                                  <input class="form-control"placeholder="Masukkan Judul Berita "name="judul_berita"required>
                                          </div> 

                                          <div class="form-group">
                                              <label>Tanggal Berita</label>
                                                  <input type="date" class="form-control" name="tanggal_berita"required>
                                          </div> 

                                          <div class="form-group">
                                              <label>Spoiler Berita</label>
                                                  <input class="form-control"placeholder="Masukkan Spoiler Berita "name="spoiler_berita"required>
                                          </div>
                                          
                                          <div class="form-group">
                                              <label>Tanggal Posting Berita</label>
                                                  <input type="date" class="form-control" name="tanggal_posting"required>
                                          </div>  

                                          <div class="form-group">
                                              <label>Isi Berita</label>
                                                  <textarea name="isi_berita"  class="ckeditor" required> </textarea>
                                          </div>
                                    
                                          <div class="form-group">
                                              <label>Foto Berita</label>
                                                  <input type="file" name="foto_berita" id="foto_berita" required>
                                          </div>  

                                        
                                          <div class="form-actions">
                                              <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>  Simpan</button>
                                              <input type="reset" value="Reset" class="btn btn-default">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    
                                          </div>
                    
                                            </form> 
                                        </div>

                                    </div>

                                </div>

                            </div>

                </section>
<br>

          <!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Berita</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Judul Berita</th>
            <th>Tanggal Berita</th>
            <th>Spoiler Berita</th>
            <th>Tanggal Posting Berita</th> 
            <th>Isi Berita</th> 
            <th>Foto Album</th> 
            <th>Aksi</th>
          </tr>
        </thead>

        <tbody>

        <?php
          $no = 1;
          while ($data = mysqli_fetch_array($data_berita)) {
        ?>
        

        <tr>

          <td><?php echo $no++; ?></td>
          <td><?php echo $data['judul_berita']; ?></td>
          <td><?php echo $data['tanggal_berita']; ?></td>
          <td><?php echo $data['spoiler_berita']; ?></td>
          <td><?php echo $data['tanggal_posting']; ?></td>
          <td><?php echo $data['isi_berita']; ?></td>
          <td><image src="image/berita/<?php echo $data['foto_berita']; ?>" style="width: 100px; height: 100px;"></td>
        
          <td align="center">
            <div>
              <a class="btn btn-success btn-circle" 
                href="edit_berita.php?id=<?php echo $data['id_berita'];?>"><i class="fas fa-info-circle"></i></a>
            </div>
            <br>
            <div>
              <a class="btn btn-danger btn-circle"
                href="aksi_hapus_berita.php?&id=<?php echo $data['id_berita'];?>" 
                onclick="return confirm('Yakin akan dihapus ?');"><i class="fas fa-trash"></i></a>
            </div>
          </td>


        </tr>

        <?php } ?>

        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

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