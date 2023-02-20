
        
<?php
    include "config/db.php";
    include "inc/head.php";
    include "inc/navbar.php";
    include "config/session.php";

    if (isset($_POST["submit"])) 
    {
        $carname = $_POST['carname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $brand = $_POST['brand'];
        $model = $_POST['model'];
        $user_id = $_SESSION['login_id'];
        $date = date("Y-m-d");
        $filename = $_FILES["image"]["name"];

        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $image_name = "car".rand(00000,99999).time().'.'.$ext;

        // Get all the submitted data from the form
        $sql = "INSERT INTO car (car_name, email, phone, brand, model, image ,date ,user_id) VALUES ('$carname', '$email', '$phone' ,'$brand','$model','$image_name','$date','$user_id')";

        // Execute query
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Added successfully')</script>";
            move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $image_name);
            header("location: mycars.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
?>

<div class="container">
    <section class="mt-5">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-white fw-bold">
                        Sell Your Car
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Car Name</label>
                                <input type="text" name="carname" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Brand</label>
                                <select name="brand" class="form-control" required>
                                    <option value="volkswagen">volkswagen</option>
                                    <option value="range rover">range rover</option>
                                    <option value="BMW">bmw</option>
                                    <option value="mercedes">mercedes</option>
                                    <option value="GMC">gmc</option>
                                    <option value="chevrolet">chevrolet</option>
                                    <option value="ford">ford</option>
                                    <option value="dodge">dodge</option>
                                    <option value="toyota">toyota</option>
                                    <option value="hyundai">hyundai</option>
                                    <option value="nissan">nissan</option>
                                    <option value="honda">honda</option>
                                    <option value="KIA">kia</option>
                                    <option value="porsche">porsche</option>
                                    <option value="rolls royce">rolls royce</option>
                                    <option value="bentley">bentley</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Model</label>
                                <!-- <input type="text" name="model" class="form-control" required> -->
                                <select name="model" class="form-control">
                                    <?php
                                        foreach(range(1950, (int)date("Y")) as $year) {
                                            echo "\t<option value='".$year."'>".$year."</option>\n\r";
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input type="file" name="image" class="form-control" accept="image/jpg, image/jpeg, image/png" required>
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
    include "inc/footer.php";
?>
