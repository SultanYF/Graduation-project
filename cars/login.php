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
    // username and password sent from form 
    $myusername = mysqli_real_escape_string($conn,$_POST['username']);
    $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
    
    $sql = "SELECT id,is_admin FROM tb_user WHERE username = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    
    $count = mysqli_num_rows($result);
    
    // If result matched $myusername and $mypassword, table row must be 1 row
    
    if($count == 1) {
        $_SESSION['login_username'] = $myusername;
        $_SESSION['login_id'] = $row['id'];
        if($row['is_admin'] == 1)
        {
            $_SESSION['is_admin'] = 1;
        }
        else
        {
            $_SESSION['is_admin'] = 0;
        }
        
        header("location: index.php");
    }else {
        $error ='
        <div class="alert alert-info" role="alert">
            Your Login Name or Password is invalid
        </div>';
    }
}
?>

<div class="container">
    <section class="mt-5">
        <div class="row justify-content-md-center">
            <div class="col col-lg-6 m-5">
                <div class="card">
                    <div class="card-header bg-white">
                        Login
                    </div>
                    <div class="card-body">
                        <?php echo @$error; ?>
                        <form action = "" method = "post">
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Username...">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password...">
                            </div>
                            <input type = "submit" value="submit" class="btn btn-secondary"/>
                            <hr>
                            <div class="text-secondary">
                            Click here to <a href="register.php">Register</a>
                            </div>
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