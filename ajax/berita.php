
                    <?php
					// Include / load file koneksi.php
                    include "../config/koneksiadmin.php";
                    ?>

                            <?php 
                            $keyword = $_GET["keyword"];
                            $sql = mysqli_query($connect, "SELECT * FROM berita WHERE judul_berita LIKE '%$keyword%'"); ?>
                            <?php while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
                            ?>
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="admin/image/berita/<?php echo $data['foto_berita']; ?>" alt="">
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="detail_berita.php?&id=<?php echo $data['id_berita']; ?>">
                                    <h2><?php echo $data['judul_berita']; ?></h2>
                                </a>
                                <p><?php echo $data['spoiler_berita']; ?></p>
                                <ul class="blog-info-link">
                                    <li><a><i class="fa fa-calendar"></i><?php echo date('M d, Y', strtotime ($data['tanggal_berita'])); ?></a></li>
                                </ul>
                            </div>
                        </article>
                        <?php
                        }
                        ?>