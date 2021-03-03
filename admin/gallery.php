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




$data_gallery = mysqli_query($koneksi,"SELECT a.*, g.* FROM gallery g LEFT JOIN album a ON g.`id_album` = a.`id_album` order by g.id_gallery ASC");

?>

<!DOCTYPE html>
<html lang="en">

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
                              <h4 class="font-weight-bold text-primary">Gallery</h4>
                            </div>
                                 <div class="card-body">
                                    <form enctype='multipart/form-data' action="aksi_tambah_gallery.php" method="POST"  id="form_tambah_gallery">

                                          <div class="form-group">
                                              <label>Foto</label>
                                                  <input type="file" name="foto_gallery" id="foto_gallery" required>
                                          </div>

                                          <div class="form-group">
                                              <label>Keterangan Foto</label>
                                                  <input class="form-control"placeholder="Masukkan Keterangan Foto "name="keterangan_foto"required>
                                          </div>

                                          <div class="form-group">
                                             <label>Nama Album</label>
                                             <select name="id_album" class="form-control">
                                             <option value="">-- Pilih Album --</option>
                                               <?php
                                             $tampil=mysqli_query($koneksi,"SELECT * FROM album ORDER BY nama_album");
                                             while($data=mysqli_fetch_array($tampil)){
                                              echo "<option value=$data[id_album]>$data[nama_album]</option>";}
                                             ?>
                                            </select>
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
    <h6 class="m-0 font-weight-bold text-primary">Data Gallery</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Keterangan Foto</th>
            <th>Nama Album</th>
            <th>Aksi</th>
          </tr>
        </thead>

        <tbody>

        <?php
          $no = 1;
          while ($data = mysqli_fetch_array($data_gallery)) {
        ?>

        <tr>

          <td><?php echo $no++; ?></td>
          <td><image src="image/gallery/<?php echo $data['foto_gallery']; ?>" style="width: 100px; height: 100px;"></td>
          <td><?php echo $data['keterangan_foto']; ?></td>
          <td><?php echo $data['nama_album']; ?></td>

          <td align="center">
            <div>
              <a class="btn btn-success btn-circle" 
                href="edit_gallery.php?id=<?php echo $data['id_gallery'];?>"><i class="fas fa-info-circle"></i></a>
            </div>
            <br>
            <div>
              <a class="btn btn-danger btn-circle"
                href="aksi_hapus_gallery.php?&id=<?php echo $data['id_gallery'];?>" 
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