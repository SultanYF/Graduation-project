<?php
include "../config/db.php";
include "../inc/head.php";
include "../inc/navbar.php";
include "../config/session.php";

if ($_SESSION["is_admin"] != 1) {
    header("Location: index.php");
}

if (isset($_POST["submit"])) 
{
    $question = $_POST['question'];
    $answer = $_POST['answer'];

    $sql = "INSERT INTO faq (question, answer) VALUES ('$question', '$answer')";

    // Execute query
    if ($conn->query($sql) === TRUE) {
        header("Location: faq.php");
    } else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}


if (isset($_POST["remove"])) 
{
    $id = $_POST['id'];
    // echo $id;
    $sql = "DELETE FROM faq WHERE id=$id";

    // Execute query
    if ($conn->query($sql) === TRUE) {
        header("Location: faq.php");
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
                <?php include "tabs.php"; ?>
            </div>
            <div class="card-body">

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Question +
                </button>

                <!-- * Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">New Question:</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action ="<?php $_PHP_SELF ?>">
                                    <div class="mb-3">
                                        <label class="form-label">Question:</label>
                                        <input type="text" name="question" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Answer:</label>
                                        <textarea name="answer" class="form-control" required></textarea>
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
                        <th scope="col">Question</th>
                        <th scope="col">Answer</th>
                        <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        @$rows = mysqli_query($conn, "SELECT * FROM faq ORDER BY id DESC");
                        foreach (@$rows as $key => $row) :
                        ?>
                            <tr>
                                <th scope="row"><?php echo $key + 1; ?></th>
                                <td><?php echo $row['question']; ?></td>
                                <td><?php echo $row['answer']; ?></td>
                                <td class="text-center">
                                    <form method="post" action ="<?php $_PHP_SELF ?>">
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