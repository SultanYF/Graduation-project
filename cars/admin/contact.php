<?php
include "../config/db.php";
include "../inc/head.php";
include "../inc/navbar.php";
include "../config/session.php";

if ($_SESSION["is_admin"] != 1) {
    header("Location: index.php");
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
                        <th scope="col">Subject</th>
                        <th scope="col">Email</th>
                        <th scope="col">Message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $rows = mysqli_query($conn, "select * FROM contact ORDER BY id DESC");
                        foreach ($rows as $key => $row) :
                    ?>
                    <tr>
                        <th scope="row"><?php echo $key+1; ?></th>
                        <td><?php echo $row['subject']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['message']; ?></td>
                    </tr>
                    <?php
                        endforeach;
                    ?>
                </tbody>
                </table>     
            </div>
        </div>
    </section>
</div>

<?php
include "../inc/footer.php";
?>