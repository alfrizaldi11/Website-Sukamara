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




$data_wisata = mysqli_query($koneksi,"SELECT * FROM wisata order by id_wisata DESC");

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
  <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h4 class="font-weight-bold text-primary">Wisata</h4>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="card-body">
            <form enctype='multipart/form-data' action="aksi_tambah_wisata.php" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label>Nama Wisata</label>
                  <input name="nama_wisata" type="text" class="form-control" placeholder="Masukkan nama wisata (jika kosong masukan '-')" required>
                </div>
                
                <div class="form-group">
                  <label>Keterangan Wisata</label>
                  <input name="keterangan_wisata" type="text" class="form-control" placeholder="Masukkan keterangan wisata(jika kosong masukan '-')" required>
                </div>

                <div class="form-group">
                  <label>Lokasi Wisata</label>
                  <input name="lokasi_wisata" type="text" class="form-control" placeholder="Masukkan lokasi wisata(jika kosong masukan '-')" required>
                </div>
				        
				        <div class="form-group">
                  <label>Foto Wisata</label>
                  <input type="file" name="foto_wisata" id="foto_wisata" required>
                </div>

                    <div class="form-actions">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>  Simpan</button>
                    <input type="reset" value="Reset" class="btn btn-default">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        
                    </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        </div>
        <!--/.col (right) -->
</section>
<br>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Wisata</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Wisata</th>
                      <th>Keterangan Wisata</th>
                      <th>Lokasi Wisata</th>
                      <th>Foto Wisata</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

                  <tbody>

                  <?php
                    $no = 1;
                    while ($data = mysqli_fetch_array($data_wisata)) {
                  ?>
                  

                  <tr>

                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['nama_wisata']; ?></td>
                    <td><?php echo $data['keterangan_wisata']; ?></td>
                    <td><?php echo $data['lokasi_wisata']; ?></td>
                    <td><image src="image/wisata/<?php echo $data['foto_wisata']; ?>" style="width: 100px; height: 100px;"></td>

                    <td align="center">
                      <div>
                        <a class="btn btn-success btn-circle" 
                          href="edit_wisata.php?id=<?php echo $data['id_wisata'];?>"><i class="fas fa-info-circle"></i></a>
                      </div>
                      <br>
                      <div>
                        <a class="btn btn-danger btn-circle"
                          href="aksi_hapus_wisata.php?&id=<?php echo $data['id_wisata'];?>" 
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

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

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

<!-- <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script> -->

</body>

</html>