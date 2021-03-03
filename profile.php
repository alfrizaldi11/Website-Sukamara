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
    <div class="bradcam_area breadcam_bg_3 overlay d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Profile</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end  -->
    <!-- popular_causes_area_start  -->
    <?php 
    include "config/koneksi.php";

    $data_visimisi = mysqli_query($koneksi,"SELECT * FROM visi_misi");
    $data_sejarah = mysqli_query($koneksi,"SELECT * FROM sejarah");
    $data=mysqli_fetch_array($data_visimisi);
    $data2=mysqli_fetch_array($data_sejarah);
    ?>
    <!-- Start Sample Area -->
	<section class="sample-text-area">
		<div class="container box_1170">
        <div class="section_title">
                            <h3> <span>Visi dan Misi</span></h3>
                        </div>
			<p class="sample-text">
            <?php echo $data['isi_visimisi']; ?>
			</p>
		</div>
	</section>
    <!-- End Sample Area -->
    
        <!-- latest_activites_area_start  -->
        <div class="latest_activites_area">
        <div class=" video_bg_2 video_activite d-flex align-items-center justify-content-center">
        </div>
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-7">
                    <div class="activites_info">
                        <div class="section_title">
                            <h3> <span>Sejarah</span></h3>
                        </div>
                        <p class="para_1"><?php echo $data2['isi_sejarah']; ?></p class="para_1">

                </div>
            </div>
        </div>
    </div>
    <!-- latest_activites_area_end  -->




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