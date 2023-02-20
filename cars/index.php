    <?php
        include "config/db.php";
        include "inc/head.php";
        include "inc/navbar.php";
    ?>
    
    <!-- Start slider -->
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://images.pexels.com/photos/544542/pexels-photo-544542.jpeg?auto=compress&cs=tinysrgb&w=1600" class="d-block w-100" alt="...">
            </div>
        </div>
    </div>
    <!-- End Slider -->
    <div class="container">
        
        <section>
            <div class="mt-5 mb-5 text-center">
                <h3>OUR BRANDS</h3>
                <span>What we've done for people</span>
            </div>
            
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col-md-2">
                    <a href="brand.php?brand=toyota">
                        <div class="card">
                            <img src="brands/toyota.png" class="card-img-top" style="width: 100%;height: 15vw;object-fit: contain;">
                        </div>
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="brand.php?brand=volkswagen">
                        <div class="card ">
                            <img src="brands/volkswagen.png" class="card-img-top" style="width: 100%;height: 15vw;object-fit: contain;">
                        </div>
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="brand.php?brand=range rover">
                        <div class="card ">
                            <img src="brands/range rover.png" class="card-img-top" style="width: 100%;height: 15vw;object-fit: contain;">
                        </div>
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="brand.php?brand=bmw">
                        <div class="card ">
                            <img src="brands/bmw.png" class="card-img-top" style="width: 100%;height: 15vw;object-fit: contain;">
                        </div>
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="brand.php?brand=mercedes">
                        <div class="card ">
                            <img src="brands/mercedes.png" class="card-img-top" style="width: 100%;height: 15vw;object-fit: contain;">
                        </div>
                    </a>
                </div>

                <div class="col-md-2">
                    <a href="brand.php?brand=gmc">
                        <div class="card ">
                            <img src="brands/gmc.png" class="card-img-top" style="width: 100%;height: 15vw;object-fit: contain;">
                        </div>
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="brand.php?brand=chevrolet">
                        <div class="card ">
                            <img src="brands/chevrolet.png" class="card-img-top" style="width: 100%;height: 15vw;object-fit: contain;">
                        </div>
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="brand.php?brand=ford">
                        <div class="card ">
                            <img src="brands/ford.png" class="card-img-top" style="width: 100%;height: 15vw;object-fit: contain;">
                        </div>
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="brand.php?brand=dodge">
                        <div class="card ">
                            <img src="brands/dodge.png" class="card-img-top" style="width: 100%;height: 15vw;object-fit: contain;">
                        </div>
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="brand.php?brand=hyundai">
                        <div class="card ">
                            <img src="brands/hyundai.png" class="card-img-top" style="width: 100%;height: 15vw;object-fit: contain;">
                        </div>
                    </a>
                </div>

                <div class="col-md-2">
                    <a href="brand.php?brand=nissan">
                        <div class="card ">
                            <img src="brands/nissan.png" class="card-img-top" style="width: 100%;height: 15vw;object-fit: contain;">
                        </div>
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="brand.php?brand=honda">
                        <div class="card ">
                            <img src="brands/honda.png" class="card-img-top" style="width: 100%;height: 15vw;object-fit: contain;">
                        </div>
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="brand.php?brand=kia">
                        <div class="card ">
                            <img src="brands/kia.png" class="card-img-top" style="width: 100%;height: 15vw;object-fit: contain;">
                        </div>
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="brand.php?brand=porsche">
                        <div class="card ">
                            <img src="brands/porsche.png" class="card-img-top" style="width: 100%;height: 15vw;object-fit: contain;">
                        </div>
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="brand.php?brand=rolls royce">
                        <div class="card ">
                            <img src="brands/rolls royce.png" class="card-img-top" style="width: 100%;height: 15vw;object-fit: contain;">
                        </div>
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="brand.php?brand=bentley">
                        <div class="card ">
                            <img src="brands/bentley.png" class="card-img-top" style="width: 100%;height: 15vw;object-fit: contain;">
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <section>
            <div class="mt-5 mb-5 text-center">
                <h3>Services</h3>
            </div>
            <div class="row justify-content-md-center row-cols-1 row-cols-md-4 g-4 text-center">
                <?php
                @$rows = mysqli_query($conn, "SELECT * FROM services");
                foreach (@$rows as $key => $row) :
                ?>
                    <div class="col">
                        <div class="card">
                            <!-- <i class="bi bi-laptop" style="font-size: 7rem;" ></i> -->
                            <div style="font-size: 7rem;">
                                <?php echo $row['icon']; ?>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['title']; ?></h5>
                                <p class="card-text"><?php echo $row['details']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </div>

    <?php
        include "inc/footer.php";
    ?>
