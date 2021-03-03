<?php 
include 'config/koneksi.php';
session_start();

$data_gallery = mysqli_query($koneksi,"SELECT * FROM gallery where id_album='$_GET[id]'");

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
                        <h3>Gallery</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- bradcam_area_end  -->


	<!-- Start Align Area -->
	<div class="whole-wrap">
		<div class="container box_1170">
			
			<div class="section-top-border">
				<div class="row gallery-item">

                <?php 
                while ($data = mysqli_fetch_array($data_gallery)) { 
                ?>

					<div class="col-md-4">
						<a href="admin/image/gallery/<?php echo $data['foto_gallery']; ?>"  class="img-pop-up">
							<div class="single-gallery-image" style="background: url(admin/image/gallery/<?php echo $data['foto_gallery']; ?>);"></div>
						</a>
                    </div>
                    
                    <?php } ?>

				</div>
			</div>

		</div>
	</div>
	<!-- End Align Area -->


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