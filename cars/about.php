
    
    <?php
        include "config/db.php";
        include "inc/head.php";
        include "inc/navbar.php";

        $query = "SELECT * FROM about WHERE id =1";
        $result = mysqli_query($conn,$query);
        $about = mysqli_fetch_assoc($result);
    ?>

    <div class="container">
        <section class="mt-5">
            <div class="card mb-3">
                <div class="card-body">
                    About
                </div>
            </div>
                <div class="card mb-3">
                    <div class="p-2">
                        <?php echo $about['text']; ?>
                    </div>
                </div>
        </section>
    </div>

    <?php
        include "inc/footer.php";
    ?>
