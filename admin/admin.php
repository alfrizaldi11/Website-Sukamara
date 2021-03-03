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




$data_admin = mysqli_query($koneksi,"SELECT * FROM myadmin WHERE level='admin'");
$data_admin2 = mysqli_query($koneksi,"SELECT * FROM myadmin order by id_admin ASC");

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
include 'sidebaradmin.php';

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

           
                <br>
      <section class="content">
        <div class="row">
          <div class="col-md-12">
                  <!-- general form elements -->
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="font-weight-bold text-primary">Admin</h4>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="card-body">
            <form role="form" action="aksi_tambah_admin.php" method="POST">
				
				          <div class="form-group">
                  <label>Username</label>
                  <input name="username" type="text" class="form-control" placeholder="Masukkan Username"required>
                </div>

				          <div class="form-group">
                  <label>Password</label>
                  <input name="mypassword" type="text" class="form-control" placeholder="Masukkan Password"required>
                </div>

				          <div class="form-group">
                  <label>Email</label>
                  <input name="email" type="text" class="form-control" placeholder="Masukkan Email"required>
                </div>

                <div class="form-group">
                  <label>Level</label>
                  <select name="level" class="form-control"required>
                  <option value="">-- Pilih Level--</option>
                  <option value="admin">Admin</option>
                </select>
                </div>

                    <div class="form-actions">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>  Simpan</button>
                    <input type="reset" value="Reset" class="btn btn-default">&nbsp;&nbsp;&nbsp;&nbsp;
                                        
                    </div>
            </form>
            </div>

</div>

</div>

</div>

</section>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Admin</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Username Admin</th> 
            <th>Email Admin</th>
            <th>Aksi</th>
          </tr>
        </thead>

        <tbody>
    <?php
        if($_SESSION['level'] == 'admin'){ // Jika role-nya admin
      ?>
        <?php
          while ($data = mysqli_fetch_array($data_admin)) {
        ?>
        
        <tr>
          <td><?php echo $data['username']; ?></td>
          <td><?php echo $data['email']; ?></td>
         
          <td align="center">

            <?php
              // Cek role user
              if($_SESSION['level'] == 'admin'){ // Jika role-nya admin
              ?>
            <div>
              <a class="btn btn-success btn-circle" 
                href="edit_admin.php?id=<?php echo $data['id_admin'];?>"><i class="fas fa-info-circle"></i></a>
            </div>
            <br>
            <div>
              <a class="btn btn-danger btn-circle"
                href="aksi_hapus_admin.php?&id=<?php echo $data['id_admin'];?>" 
                onclick="return confirm('Yakin akan dihapus ?');"><i class="fas fa-trash"></i></a>
            </div>
              <?php
                }
              ?>
          </td>


        </tr>

        <?php } ?>

    <?php
    }
    ?>

<?php
        if($_SESSION['level'] == 'admin_master'){ // Jika role-nya admin
      ?>
        <?php
          while ($data = mysqli_fetch_array($data_admin2)) {
        ?>
        
        <tr>
          <td><?php echo $data['username']; ?></td>
          <td><?php echo $data['email']; ?></td>
         
          <td align="center">

          <div>
              <a class="btn btn-success btn-circle" 
                href="edit_admin.php?id=<?php echo $data['id_admin'];?>"><i class="fas fa-info-circle"></i></a>
            </div>
            <br>
            
          <?php
            if($data['level'] == 'admin'){ // Jika role-nya admin
          ?>
            <div>
              <a class="btn btn-danger btn-circle"
                href="aksi_hapus_admin.php?&id=<?php echo $data['id_admin'];?>" 
                onclick="return confirm('Yakin akan dihapus ?');"><i class="fas fa-trash"></i></a>
            </div>

            <?php
              }
            ?>

          </td>


        </tr>

        <?php } ?>

    <?php
    }
    ?>

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