<?php
include "../config/db.php";
include "../inc/head.php";
include "../inc/navbar.php";
include "../config/session.php";

if ($_SESSION["is_admin"] != 1) {
    header("Location: index.php");
}

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $text = $_POST['text'];

    $sql = "UPDATE about SET text='$text' WHERE id=1";

    if ($conn->query($sql) === TRUE) {
        $Message = urlencode("About updated successfully");
        header("Location:about.php?Message=".$Message); 
    } else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}



$query = "SELECT * FROM about WHERE id =1";
$result = mysqli_query($conn,$query);
$about = mysqli_fetch_assoc($result);

?>

<div class="container">
    <section class="mt-5">
        <div class="card">
            <div class="card-header bg-white">
                <?php include "tabs.php"; ?>
            </div>
            <div class="card-body">
                <?php 
                    if(isset($_GET['Message'])):
                        ?>
                            <div class="alert alert-info" role="alert">
                                <?php echo $_GET['Message'];?>
                            </div>
                        <?php
                    endif;
                ?>
                <form action = "" method = "post" class="p-1">
                    <div class="mb-3">
                        <textarea name="text" class="form-control" cols="30" rows="10" required><?php echo $about['text']; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </section>
</div>

<?php
include "../inc/footer.php";
?>