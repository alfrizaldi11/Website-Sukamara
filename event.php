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
    <div class="bradcam_area breadcam_bg_2 overlay d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Event</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end  -->


    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                    <div id="container">
                    <?php
					// Include / load file koneksi.php
					include "config/koneksiadmin.php";
					
					// Cek apakah terdapat data page pada URL
					$page = (isset($_GET['page']))? $_GET['page'] : 1;
					
					$limit = 6; // Jumlah data per halamannya
					
					// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
					$limit_start = ($page - 1) * $limit;
					
					// Buat query untuk menampilkan data siswa sesuai limit yang ditentukan
					$sql = mysqli_query($connect, "SELECT * FROM event LIMIT ".$limit_start.",".$limit);
					
					$no = $limit_start + 1; // Untuk penomoran tabel
					while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
					?>

                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="admin/image/event/<?php echo $data['foto_event']; ?>" alt="">
                                <a href="#" class="blog_item_date">
                                    <h3><?php echo date('M d, Y', strtotime ($data['tanggal_event'])); ?></h3>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block">
                                    <h2><?php echo $data['judul_event']; ?></h2>
                                </a>
                                <p><?php echo $data['keterangan_event']; ?></p>
                                <ul class="blog-info-link">
                                    <li><a href="<?php echo $data['lokasi_event']; ?>"><i class="fa fa-map-marker"></i> Lokasi Event</a></li>
                                </ul>
                            </div>
                        </article>

                        <?php
                        $no++; 
                        }
                        ?>
                    </div>

                <nav class="blog-pagination justify-content-center d-flex">
                    <ul class="pagination">
                            <!-- LINK FIRST AND PREV -->
                            <?php
                            if($page == 1){ // Jika page adalah page ke 1, maka disable link PREV
                            ?>
                                <li class="page-item disabled"><a class="page-link" href="#">First</a></li>
                                <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
                            <?php
                            }else{ // Jika page bukan page ke 1
                                $link_prev = ($page > 1)? $page - 1 : 1;
                            ?>
                                <li class="page-item"><a class="page-link" href="event.php?page=1">First</a></li>
                                <li class="page-item"><a class="page-link" href="event.php?page=<?php echo $link_prev; ?>">&laquo;</a></li>
                            <?php
                            }
                            ?>
                            
                            <!-- LINK NUMBER -->
                            <?php
                            // Buat query untuk menghitung semua jumlah data
                            $sql2 = mysqli_query($connect, "SELECT COUNT(*) AS jumlah FROM event");
                            $get_jumlah = mysqli_fetch_array($sql2);
                            
                            $jumlah_page = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
                            $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
                            $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
                            $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
                            
                            for($i = $start_number; $i <= $end_number; $i++){
                                $link_active = ($page == $i)? ' class="active"' : '';
                            ?>
                                <li class="page-item" <?php echo $link_active; ?>><a class="page-link" href="event.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                            <?php
                            }
                            ?>
                            
                            <!-- LINK NEXT AND LAST -->
                            <?php
                            // Jika page sama dengan jumlah page, maka disable link NEXT nya
                            // Artinya page tersebut adalah page terakhir 
                            if($page == $jumlah_page){ // Jika page terakhir
                            ?>
                                <li class="page-item disabled"><a class="page-link" href="#">&raquo;</a></li>
                                <li class="page-item disabled"><a class="page-link" href="#">Last</a></li>
                            <?php
                            }else{ // Jika Bukan page terakhir
                                $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
                            ?>
                                <li class="page-item"><a class="page-link" href="event.php?page=<?php echo $link_next; ?>">&raquo;</a></li>
                                <li class="page-item"><a class="page-link" href="event.php?page=<?php echo $jumlah_page; ?>">Last</a></li>
                            <?php
                            }
                            ?>
                    </ul>
                </nav>

                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form action="#">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder='Search Keyword'
                                            onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Search Keyword'" id="keyword">
                                        <div class="input-group-append">
                                            <button class="btn" type="button"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                    type="submit" id="tombol-cari">Search</button>
                            </form>
                        </aside>

                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Berita</h3>
                        <?php
					// Include / load file koneksi.php
					include "config/koneksiadmin.php";
					
					// Cek apakah terdapat data page pada URL
					$page = (isset($_GET['page']))? $_GET['page'] : 1;
					
					$limit = 4; // Jumlah data per halamannya
					
					// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
					$limit_start = ($page - 1) * $limit;
					
					// Buat query untuk menampilkan data siswa sesuai limit yang ditentukan
					$sql = mysqli_query($connect, "SELECT * FROM berita LIMIT ".$limit_start.",".$limit);
					
					$no = $limit_start + 1; // Untuk penomoran tabel
					while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
					?>

                            <div class="media post_item">
                                <img src="admin/image/berita/<?php echo $data['foto_berita']; ?>" alt="post">
                                <div class="media-body">
                                    <a href="blog_berita.php">
                                        <h3><?php echo $data['judul_berita']; ?></h3>
                                    </a>
                                    <p><?php echo date('M d, Y', strtotime ($data['tanggal_berita'])); ?></p>
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
    <!--================Blog Area =================-->

<?php
include 'myfooter.php';

?>

    <script src="js/script2.js"></script>
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

</body>
</html>