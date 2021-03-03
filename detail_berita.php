<?php 
include 'config/koneksi.php';
session_start();

?>

<!doctype html>
<html class="no-js" lang="zxx">

<?php
include 'myhead.php';

?>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <?php
        include 'myheader.php';

        ?>

  <!-- bradcam_area_start  -->
  <div class="bradcam_area breadcam_bg overlay d-flex align-items-center justify-content-center">
      <div class="container">
          <div class="row">
              <div class="col-xl-12">
                  <div class="bradcam_text text-center">
                      <h3>Detail Berita</h3>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- bradcam_area_end  -->

   <!--================Blog Area =================-->
   <section class="blog_area single-post-area section-padding">
      <div class="container">
         <div class="row">

         <?php 
                $sql= mysqli_query($koneksi,"SELECT * FROM berita where id_berita='$_GET[id]'");
                while ($data = mysqli_fetch_array($sql)) { 
            ?>
            <div class="col-lg-8 posts-list">
               <div class="single-post">
                  <div class="feature-img">
                     <img class="img-fluid" src="admin/image/berita/<?php echo $data['foto_berita']; ?>" alt="">
                  </div>
                  <div class="blog_details">
                     <h2>
                         <?php echo $data['judul_berita']; ?>
                     </h2>
                     <ul class="blog-info-link mt-3 mb-4">
                        <li><a><i class="fa fa-user"></i> Post by Admin</a></li>
                        <li><a><i class="fa fa-calendar"></i>Diposting <?php echo date('M d, Y', strtotime ($data['tanggal_posting'])); ?></a></li>
                     </ul>
                     <p class="excert">
                        <?php echo $data['isi_berita']; ?>
                     </p>

                     <?php } ?>
                  </div>
               </div>
              
            </div>
            <div class="col-lg-4">
               <div class="blog_right_sidebar">
               <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Event</h3>
                        <?php
					// Include / load file koneksi.php
					include "config/koneksiadmin.php";
					
					// Cek apakah terdapat data page pada URL
					$page = (isset($_GET['page']))? $_GET['page'] : 1;
					
					$limit = 4; // Jumlah data per halamannya
					
					// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
					$limit_start = ($page - 1) * $limit;
					
					// Buat query untuk menampilkan data siswa sesuai limit yang ditentukan
					$sql = mysqli_query($connect, "SELECT * FROM event LIMIT ".$limit_start.",".$limit);
					
					$no = $limit_start + 1; // Untuk penomoran tabel
					while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
					?>

                            <div class="media post_item">
                                <img src="admin/image/event/<?php echo $data['foto_event']; ?>" alt="post">
                                <div class="media-body">
                                    <a href="event.php">
                                        <h3><?php echo $data['judul_event']; ?></h3>
                                    </a>
                                    <p><?php echo date('M d, Y', strtotime ($data['tanggal_event'])); ?></p>
                                </div>
                            </div>
                        
                        <?php
                        $no++; 
                        }
                        ?>

                        </aside>
               </div>
            </div>

         </div>
      </div>
   </section>
   <!--================ Blog Area end =================-->

   <?php
        include 'myfooter.php';

        ?>

  <!-- JS here -->
  <script src="js/vendor/modernizr-3.5.0.min.js"></script>
  <script src="js/vendor/jquery-1.12.4.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/isotope.pkgd.min.js"></script>
  <script src="js/ajax-form.js"></script>
  <script src="js/waypoints.min.js"></script>
  <script src="js/jquery.counterup.min.js"></script>
  <script src="js/imagesloaded.pkgd.min.js"></script>
  <script src="js/scrollIt.js"></script>
  <script src="js/jquery.scrollUp.min.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/nice-select.min.js"></script>
  <script src="js/jquery.slicknav.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/gijgo.min.js"></script>
  <!--contact js-->
  <script src="js/contact.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/jquery.form.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script src="js/mail-script.js"></script>

  <script src="js/main.js"></script>
  <script>
      $('.datepicker').datepicker({
          iconsLibrary: 'fontawesome',
          icons: {
              rightIcon: '<span class="fa fa-calendar"></span>'
          }
      });

      $('.timepicker').timepicker({
          iconsLibrary: 'fontawesome',
          icons: {
              rightIcon: '<span class="fa fa-clock-o"></span>'
          }
      });
  </script>
</body>

</html>