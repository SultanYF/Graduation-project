<?php
include "../config/db.php";
include "../inc/head.php";
include "../inc/navbar.php";
include "../config/session.php";

if ($_SESSION["is_admin"] != 1) {
    header("Location: index.php");
}



if (isset($_POST["approve"])) {
    $id = $_POST['carid'];
    $sql = "UPDATE car SET status='y' WHERE id=$id";

    $conn->query($sql);
}


if (isset($_POST["reject"])) {
    $id = $_POST['carid'];
    $sql = "UPDATE car SET status='n' WHERE id=$id";

    $conn->query($sql);
}

?>

<div class="container">
    <section class="mt-5">
        <div class="card">
            <div class="card-header bg-white">
                <?php include "tabs.php"; ?>
            </div>
            <div class="card-body text-center">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Car Name</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Model</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Date</th>
                            <th scope="col">User</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $rows = mysqli_query($conn, "SELECT * FROM car ORDER BY id DESC");
                        foreach ($rows as $key => $row) :

                            $user_id = $row["user_id"];
                            $query = "SELECT name FROM tb_user WHERE id ='$user_id'";
                            $result = mysqli_query($conn,$query);
                            $res = mysqli_fetch_assoc($result);
                        ?>
                            <tr>
                                <th scope="row"><?php echo $key + 1; ?></th>
                                <td>
                                    <a href="view.php?carid=<?php echo $row["id"]; ?>">
                                        <?php echo $row['car_name']; ?>
                                    </a>
                                </td>
                                <td><?php echo $row['brand']; ?></td>
                                <td><?php echo $row['model']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['phone']; ?></td>
                                <td><?php echo $row['date']; ?></td>
                                <td><?php echo $res["name"]; ?></td>
                                <td>
                                    <?php
                                    if ($row["status"] == "y") {
                                        echo "<b style='color:green'>Approve</b>";
                                    } elseif ($row["status"] == "n") {
                                        echo "<b style='color:red'>Reject</b>";
                                    } else {
                                        echo "<b style='color:blue'>Waiting</b>";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <form method="post" action="<?php $_PHP_SELF ?>">
                                        <?php
                                        if ($row["status"] == "y") {
                                            echo '<input name="carid" type="text" value="' . $row["id"] . '" hidden>';
                                            echo '<button name="reject" type="submit" class="btn btn-danger"><i class="bi bi-dash-circle"></i></button>';
                                        } elseif ($row["status"] == "n") {
                                            echo '<input name="carid" type="text" value="' . $row["id"] . '" hidden>';
                                            echo '<button name="approve" type="submit" class="btn btn-success"><i class="bi bi-check-circle"></i></button>';
                                        } else {
                                            echo '<input name="carid" type="text" value="' . $row["id"] . '" hidden>';
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