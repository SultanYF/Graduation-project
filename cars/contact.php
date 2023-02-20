
    
    <?php
        include "config/db.php";
        include "inc/head.php";
        include "inc/navbar.php";

        if($_SERVER["REQUEST_METHOD"] == "POST") {

            $subject = $_POST['subject'];
            $email = $_POST['email'];
            $message = $_POST['message'];
        
            $sql = "INSERT INTO contact (subject, email, message) VALUES ('$subject', '$email', '$message')";
        
            if ($conn->query($sql) === TRUE) {
                $success = '
                <div class="alert alert-info m-1" role="alert">
                    Sent succesfully
                </div>';
            } else 
            {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        
            $conn->close();
        }

    ?>

    <div class="container">
        <section class="mt-5">
            <div class="card mb-3">
                <div class="card-body">
                    Contact
                </div>
            </div>
            <div class="card mb-3">
                <?php echo @$success; ?>
                <form action = "" method = "post" class="p-3">
                    <div class="mb-3">
                        <label class="form-label">Subject</label>
                        <input type="text" name="subject" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Message</label>
                        <textarea name="message" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </section>
    </div>

    <?php
        include "inc/footer.php";
    ?>
