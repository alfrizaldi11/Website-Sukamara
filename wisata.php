
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
    <div class="bradcam_area breadcam_bg_1 overlay d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Wisata</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end  -->

    <!-- popular_causes_area_start  -->
    <div class="popular_causes_area pt-120">
        <div class="container">
            <div class="row">
            <?php
					// Include / load file koneksi.php
					include "config/koneksiadmin.php";
					
					// Cek apakah terdapat data page pada URL
					$page = (isset($_GET['page']))? $_GET['page'] : 1;
					
					$limit = 6; // Jumlah data per halamannya
					
					// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
					$limit_start = ($page - 1) * $limit;
					
					// Buat query untuk menampilkan data siswa sesuai limit yang ditentukan
					$sql = mysqli_query($connect, "SELECT * FROM wisata LIMIT ".$limit_start.",".$limit);
					
					$no = $limit_start + 1; // Untuk penomoran tabel
					while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
					?>
                <div class="col-lg-6 col-md-9">
                    <div class="single_cause">
                        <div class="thumb">
                            <img src="admin/image/wisata/<?php echo $data['foto_wisata']; ?>" alt="">
                        </div>
                        <div class="causes_content">
                            <a ><h4><?php echo $data['nama_wisata']; ?></h4></a>
                            <p><?php echo $data['keterangan_wisata']; ?></p>
                            <a class="read_more" href="<?php echo $data['lokasi_wisata']; ?>">Lihat Lokasi</a>
                        </div>
                    </div>
                </div>
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
                                <li class="page-item"><a class="page-link" href="wisata.php?page=1">First</a></li>
                                <li class="page-item"><a class="page-link" href="wisata.php?page=<?php echo $link_prev; ?>">&laquo;</a></li>
                            <?php
                            }
                            ?>
                            
                            <!-- LINK NUMBER -->
                            <?php
                            // Buat query untuk menghitung semua jumlah data
                            $sql2 = mysqli_query($connect, "SELECT COUNT(*) AS jumlah FROM wisata");
                            $get_jumlah = mysqli_fetch_array($sql2);
                            
                            $jumlah_page = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
                            $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
                            $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
                            $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
                            
                            for($i = $start_number; $i <= $end_number; $i++){
                                $link_active = ($page == $i)? ' class="active"' : '';
                            ?>
                                <li class="page-item" <?php echo $link_active; ?>><a class="page-link" href="wisata.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
                                <li class="page-item"><a class="page-link" href="wisata.php?page=<?php echo $link_next; ?>">&raquo;</a></li>
                                <li class="page-item"><a class="page-link" href="wisata.php?page=<?php echo $jumlah_page; ?>">Last</a></li>
                            <?php
                            }
                            ?>
                    </ul>
                </nav>

        </div>
    </div>
    <!-- popular_causes_area_end  -->

    <?php
        include 'myfooter.php';

        ?>

    <!-- link that opens popup -->

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