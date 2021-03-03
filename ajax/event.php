
                    <?php
					// Include / load file koneksi.php
                    include "../config/koneksiadmin.php";
                    ?>

                            <?php 
                            $keyword = $_GET["keyword"];
                            $sql = mysqli_query($connect, "SELECT * FROM event WHERE judul_event LIKE '%$keyword%'"); ?>
                            <?php while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
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
                        }
                        ?>