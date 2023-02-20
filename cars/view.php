
        
        <?php
            include "config/db.php";
            include "inc/head.php";
            include "inc/navbar.php";





            // Get car deatils
            $carid = $_GET['carid'];

            $check = mysqli_query($conn,"select * from car where id='$carid' ");
            $row = mysqli_fetch_array($check,MYSQLI_ASSOC);

            $count = mysqli_num_rows($check);
            if($count <= 0) {
                header("location: cars.php");
            }

            // Get Name
            $user_id = $row["user_id"];
            $query = "SELECT name FROM tb_user WHERE id ='$user_id'";
            $result = mysqli_query($conn,$query);
            $res = mysqli_fetch_assoc($result);


            //Reservation
            if (isset($_POST["submit"])) 
            {
                $date = $_POST['date'];
                $car_id = $_POST['car_id'];
                $user_id = $_SESSION['login_id'];

                $sql = "INSERT INTO reservation (date, car_id, user_id) VALUES ('$date', '$car_id', '$user_id')";

                // Execute query
                if ($conn->query($sql) === TRUE) {
                    echo "<script>alert('reservation')<script>";
                    header("Location: reservation.php");
                } else 
                {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
            }


        ?>

        <div class="container">
            <section class="mt-5">
                <div class="card">
                    <div class="card-header bg-white">
                        <?php echo $row['car_name']; ?>
                    </div>
                    <img src="uploads/<?php echo $row["image"]; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                    <?php
                    if(isset($_SESSION['login_username']) AND $row["user_id"] != $_SESSION['login_id'])
                    {
                    ?>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Reservation
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Reservation : <?php echo $row['car_name']; ?> </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action ="<?php $_PHP_SELF ?>">
                                            <div class="mb-3 row">
                                                <label class="col-sm-2 col-form-label">Date</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="car_id" value="<?php echo $row['id']; ?>" hidden>
                                                    <input type="date" name="date" class="form-control-plaintext" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name="submit" class="btn btn-primary">Reservation</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                        <p class="card-text">User :  <?php echo $res['name']; ?></p>
                        <p class="card-text">Date :  <?php echo $row['date']; ?></p>
                        <p class="card-text">Brand : <?php echo $row['brand']; ?></p>
                        <p class="card-text">Model : <?php echo $row['model']; ?></p>
                        <p class="card-text">Email : <?php echo $row['email']; ?></p>
                        <p class="card-text">Phone : <?php echo $row['phone']; ?></p>
                    </div>
                </div>

                
            </section>
        </div>

        <?php
            include "inc/footer.php";
        ?>
