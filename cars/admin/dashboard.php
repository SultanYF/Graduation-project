<?php
include "../config/db.php";
include "../inc/head.php";
include "../inc/navbar.php";
include "../config/session.php";

if ($_SESSION["is_admin"] != 1) {
    header("Location: ../index.php");
}

?>

<div class="container">
    <section class="mt-5">
        <div class="card">
            <div class="card-header bg-white">
                <?php include "tabs.php"; ?>
            </div>
            <div class="card-body text-center">
                <div class="row row-cols-1 row-cols-md-2 g-5">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                    $query1 = "SELECT * FROM tb_user";
                                    $result1 = mysqli_query($conn, $query1);
                                    $tot1 = mysqli_num_rows($result1);
                                ?>
                                <h5 class="card-title">Users</h5>
                                <p class="card-text"><?php echo $tot1; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                    $query2 = "SELECT * FROM car";
                                    $result2 = mysqli_query($conn, $query2);
                                    $tot2 = mysqli_num_rows($result2);
                                ?>
                                <h5 class="card-title">Cars</h5>
                                <p class="card-text"><?php echo $tot2; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                    $query3 = "SELECT * FROM reservation";
                                    $result3 = mysqli_query($conn, $query3);
                                    $tot3 = mysqli_num_rows($result3);
                                ?>
                                <h5 class="card-title">Reservation</h5>
                                <p class="card-text"><?php echo $tot3; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Contact</h5>
                                <p class="card-text">X</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
include "../inc/footer.php";
?>