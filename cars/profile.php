<?php
include "config/db.php";
include "inc/head.php";
include "inc/navbar.php";
include "config/session.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

   $name = $_POST['name'];
   $username = $_POST['username'];
   $email = $_POST['email'];
   // $password = $_POST['password'];

   $myID = $_SESSION['login_id'];

   $sql = "UPDATE tb_user SET name='$name' , username='$username' , email='$email' WHERE id='$myID'";

   if ($conn->query($sql) === TRUE) {
      $Message = urlencode("Profile updated successfully");
      header("Location:profile.php?Message=".$Message);
      die;
   } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
   }

   $conn->close();
}


   // My Information
   $user_id = $_SESSION['login_id'];
   $query = "SELECT * FROM tb_user WHERE id ='$user_id'";
   $result = mysqli_query($conn,$query);
   $res = mysqli_fetch_assoc($result);

?>

<div class="container">
   <section class="mt-5">
      <div class="row justify-content-md-center">
         <div class="col col-lg-6 m-5">
            <div class="card">
               <div class="card-header bg-white">
                  Update Profile
               </div>
               <div class="card-body">
                  <?php 
                        if(isset($_GET['Message'])):
                           ?>
                           <div class="alert alert-success" role="alert">
                              <?php echo $_GET['Message'];?>
                           </div>
                           <?php
                        endif;
                  ?>
                  <form action="" method="post">
                     <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $res['name']; ?>" placeholder="Name..." required>
                     </div>

                     <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $res['username']; ?>" placeholder="Username..." required>
                     </div>

                     <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $res['email']; ?>" placeholder="Username..." required>
                     </div>

                     <!-- <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password...">
                     </div> -->

                     <input type="submit" value="submit" class="btn btn-secondary" />
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