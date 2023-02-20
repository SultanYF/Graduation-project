<?php
include "../config/db.php";
include "../inc/head.php";
include "../inc/navbar.php";
include "../config/session.php";

if ($_SESSION["is_admin"] != 1) {
    header("Location: index.php");
}

if (isset($_POST["submit"])) {
    $icon = $_POST['icon'];
    $title = $_POST['title'];
    $details = $_POST['details'];

    $sql = "INSERT INTO services (icon, title, details) VALUES ('$icon', '$title', '$details')";

    // Execute query
    if ($conn->query($sql) === TRUE) {
        header("Location: services.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}


if (isset($_POST["remove"])) {
    $id = $_POST['id'];
    // echo $id;
    $sql = "DELETE FROM services WHERE id=$id";

    // Execute query
    if ($conn->query($sql) === TRUE) {
        header("Location: services.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

?>

<div class="container">
    <section class="mt-5">
        <div class="card">
            <div class="card-header bg-white">
                <?php include "tabs.php"; ?>
            </div>
            <div class="card-body">

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Service +
                </button>

                <!-- * Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">New Service:</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="<?php $_PHP_SELF ?>">
                                    <div class="mb-3">
                                        <label class="form-label">icon:</label>
                                        <input type="text" name="icon" class="form-control" required>
                                        <a href="https://icons.getbootstrap.com/" target="_blank">Link Icons</a>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">title:</label>
                                        <input type="text" name="title" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">details:</label>
                                        <textarea name="details" class="form-control" required></textarea>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary">Add</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / Modal -->

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">icon</th>
                            <th scope="col">title</th>
                            <th scope="col">details</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        @$rows = mysqli_query($conn, "SELECT * FROM services ORDER BY id DESC");
                        foreach (@$rows as $key => $row) :
                        ?>
                            <tr>
                                <th scope="row"><?php echo $key + 1; ?></th>
                                <td><?php echo $row['icon']; ?></td>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['details']; ?></td>
                                <td class="text-center">
                                    <form method="post" action="<?php $_PHP_SELF ?>">
                                        <input type="text" name="id" value="<?php echo $row['id']; ?>" hidden>
                                        <button type="submit" name="remove" class="btn btn-danger"><i class="bi bi-x-lg"></i></button>
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