<?php
include "../config/db.php";
include "../inc/head.php";
include "../inc/navbar.php";
include "../config/session.php";

if ($_SESSION["is_admin"] != 1) {
    header("Location: index.php");
}


if (isset($_POST["approve"])) {
    $id = $_POST['reservation_id'];
    $sql = "UPDATE reservation SET status='y' WHERE id=$id";

    $conn->query($sql);
}


if (isset($_POST["reject"])) {
    $id = $_POST['reservation_id'];
    $sql = "UPDATE reservation SET status='n' WHERE id=$id";

    $conn->query($sql);
}

?>

<div class="container">
    <section class="mt-5">
        <div class="card">
            <div class="card-header bg-white">
                <?php include "tabs.php"; ?>
            </div>
            <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Car Name</th>
                                    <th scope="col">Brand</th>
                                    <th scope="col">Model</th>
                                    <th scope="col">Reservation Date</th>
                                    <th scope="col">By User</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                @$rows = mysqli_query($conn, "SELECT * FROM reservation");
                                
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
                                    <td><?php echo $row['date']; ?></td>
                                    <td><?php echo $resUser['name']; ?></td>
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
                                    <td>
                                    <form method="post" action="<?php $_PHP_SELF ?>">
                                        <?php
                                        if ($row["status"] == "y") {
                                            echo '<input name="reservation_id" type="text" value="' . $row["id"] . '" hidden>';
                                            echo '<button name="reject" type="submit" class="btn btn-danger"><i class="bi bi-dash-circle"></i></button>';
                                        } elseif ($row["status"] == "n") {
                                            echo '<input name="reservation_id" type="text" value="' . $row["id"] . '" hidden>';
                                            echo '<button name="approve" type="submit" class="btn btn-success"><i class="bi bi-check-circle"></i></button>';
                                        } else {
                                            echo '<input name="reservation_id" type="text" value="' . $row["id"] . '" hidden>';
                                            echo '<button name="approve" type="submit" class="btn btn-success"><i class="bi bi-check-circle"></i></button>';
                                            echo "&nbsp;";
                                            echo '<button name="reject" type="submit" class="btn btn-danger"><i class="bi bi-dash-circle"></i></button>';
                                        }

                                        ?>
                                    </form>
                                </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
        </div>
    </section>
</div>

<?php
include "../inc/footer.php";
?>