  <!-- footer_start  -->
  <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-6 col-lg-4 ">
                        <div class="footer_widget">
                            <div class="footer_logo">
                                <a href="#">
                                    <img src="img/myfooter_logo.png" alt="">
                                </a>
                            </div>
                            <p class="address_text">Lorem ipsum dolor sit amet, <br> consectetur adipiscing elit, sed do <br> eiusmod tempor incididunt ut labore.
                            </p>


                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Menu
                            </h3>
                            <ul class="links">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="profile.php">Profile</a></li>
                                <li><a href="wisata.php">Wisata</i></a></li>
                                <li><a href="event.php">Event</i></a></li>
                                <li><a href="blog_berita.php">Berita</i></a></li>
                                <li><a href="album.php">Gallery</i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Contacts
                            </h3>
                            <div class="contacts">
                                <p>+2(305) 587-3407 <br>
                                    info@loveuscharity.com <br>
                                    Flat 20, Reynolds Neck, North
                                    Helenaville, FV77 8WS
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Wisata
                            </h3>
                            <ul class="news_links">

                            <?php
					// Include / load file koneksi.php
					include "config/koneksiadmin.php";
					
					// Cek apakah terdapat data page pada URL
					$page = (isset($_GET['page']))? $_GET['page'] : 1;
					
					$limit = 4; // Jumlah data per halamannya
					
					// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
					$limit_start = ($page - 1) * $limit;
					
					// Buat query untuk menampilkan data siswa sesuai limit yang ditentukan
					$sql = mysqli_query($connect, "SELECT * FROM wisata LIMIT ".$limit_start.",".$limit);
					
					$no = $limit_start + 1; // Untuk penomoran tabel
					while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
					?>
                                <li>
                                    <div class="thumb">
                                        <a href="wisata.php">
                                            <img src="admin/image/wisata/<?php echo $data['foto_wisata']; ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="info">
                                        <a href="wisata.php">
                                            <h4><?php echo $data['nama_wisata']; ?></h4>
                                        </a>
                                        <span><a href="wisata.php">Lihat Lokasi</a></span>
                                    </div>
                                </li>
                        <?php
                        $no++; 
                        }
                        ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="row">
                    <div class="bordered_1px "></div>
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer_end  -->