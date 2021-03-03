<?php 
include 'config/koneksi.php';
session_start();

$data_album = mysqli_query($koneksi,"SELECT * FROM album order by id_album ASC");

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
    <div class="bradcam_area breadcam_bg_1 overlay d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Album</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end  -->

    <!-- popular_causes_area_start  -->

 <div class="our_volunteer_area section_padding">
        <div class="container">
            <div class="row">
            <?php
        while ($data = mysqli_fetch_array($data_album)) {
        ?>

                <div class="col-lg-4 col-md-6">
                    <div class="single_volenteer">
                        <div class="volenteer_thumb">
                            <a href="gallery.php?&id=<?php echo $data['id_album']; ?>">
                                <img src="admin/image/album/<?php echo $data['foto_album']; ?>" alt="">
                            </a>
                        </div>
                        <div class="voolenteer_info d-flex align-items-end">
                            <div class="info_inner">
                                <a href="gallery.php?&id=<?php echo $data['id_album']; ?>">
                                    <h4><?php echo $data['nama_album']; ?></h4>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
</div>



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