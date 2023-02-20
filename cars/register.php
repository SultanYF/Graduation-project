<?php
include "config/db.php";
include "inc/head.php";
include "inc/navbar.php";

if(isset($_SESSION['login_username']))
{
    header("location: index.php");
}

// Login Form
if($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO tb_user (name, username, email, password) VALUES ('$name', '$username', '$email' ,'$password')";

    if ($conn->query($sql) === TRUE) {
        $success = '
        <div class="alert alert-info" role="alert">
            Successfully registered
        </div>d';
    } else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

?>

<div class="container">
    <section class="mt-5">
        <div class="row justify-content-md-center">
            <div class="col col-lg-6 m-5">
                <div class="card">
                    <div class="card-header bg-white">
                        Register
                    </div>
                    <div class="card-body">
                        <?php echo @$success; ?>
                        <form action = "" method = "post">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Name...">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Username...">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Username...">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password...">
                            </div>
                            <!-- <button type="submit" class="btn btn-primary">Login</button> -->
                            <input type = "submit" value="submit" class="btn btn-secondary"/>
                            <!-- <button type="submit" class="btn btn-secondary">Login</button> -->
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