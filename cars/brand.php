
        
        <?php
            include "config/db.php";
            include "inc/head.php";
            include "inc/navbar.php";

            $brand = $_GET['brand'];
        ?>

        <div class="container">
            <section class="mt-5">
                <div class="card mb-3">
                    <div class="card-body">
                        Search Car : <?php echo $brand; ?>
                    </div>
                </div>

                <?php
                    $i = 1;
                    $rows = mysqli_query($conn, "SELECT * FROM car WHERE brand='$brand'")
                ?>
                
                <?php foreach ($rows as $row) :
                    
                    $user_id = $row["user_id"];
                    $query = "SELECT name FROM tb_user WHERE id ='$user_id'";
                    $result = mysqli_query($conn,$query);
                    $res = mysqli_fetch_assoc($result);

                    ?>
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-1">
                            <a href="view.php?carid=<?php echo $row["id"]; ?>">
                                <img src="uploads/<?php echo $row["image"]; ?>" class="img-fluid rounded-start" alt="...">
                            </a>
                        </div>
                        <div class="col-md-11">
                            <div class="card-body">
                                <h5 class="card-title"><a href="#" class="text-decoration-none text-secondary"><?php echo $row["car_name"]; ?></a></h5>
                                <p class="card-text">User : <?php echo $res['name']; ?> - Barnd : <?php echo $row["brand"]; ?> - Model : <?php echo $row["model"]; ?></p>
                                <p class="card-text"><small class="text-muted"><?php echo $row["date"]; ?></small></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </section>
        </div>

        <?php
            include "inc/footer.php";
        ?>
