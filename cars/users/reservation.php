
        
<?php
    include "../config/db.php";
    include "../inc/head.php";
    include "../inc/navbar.php";
    include "../config/session.php";


    
?>

<div class="container">
    <section class="mt-5">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-white fw-bold">
                        My Reservation
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Car Name</th>
                                    <th scope="col">Brand</th>
                                    <th scope="col">Model</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Reservation Date</th>
                                    <th scope="col">Reservation Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $i = 1;
                                $myID = $_SESSION['login_id'];

                                @$rows = mysqli_query($conn, "SELECT * FROM reservation WHERE user_id=$myID");
                                
                            ?>
                            <?php foreach ($rows as $key => $row) : 
                                
                                $car_id = $row['car_id'];
                                $user_id = $row['user_id'];

                                // Get Car Informations By Id
                                $car = mysqli_query($conn,"SELECT * FROM car WHERE id='$car_id'");
                                $resCar = mysqli_fetch_assoc($car);

                                // Get User Informations By Id
                                $user = mysqli_query($conn,"SELECT * FROM tb_user WHERE id ='$user_id'");
                                $resUser = mysqli_fetch_assoc($user);

                            ?>
                                
                                <tr>
                                    <th scope="row"><?php echo $key+1; ?></th>
                                    <td><a href="view.php?carid=<?php echo $resCar['id'];?>"><?php echo $resCar['car_name']; ?></a></td>
                                    <td><?php echo $resCar['brand']; ?></td>
                                    <td><?php echo $resCar['model']; ?></td>
                                    <td><?php echo $resUser['name']; ?></td>
                                    <td><?php echo $row['date']; ?></td>
                                    <td>
                                        <?php 
                                            if($row['status'] == "y")
                                            {
                                                echo "accepted";
                                            }
                                            elseif($row['status'] == "n")
                                            {
                                                echo "canceled";
                                            }
                                            else
                                            {
                                                echo "waiting";
                                            }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
    include "../inc/footer.php";
?>
