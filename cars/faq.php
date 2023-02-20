
    
    <?php
        include "config/db.php";
        include "inc/head.php";
        include "inc/navbar.php";
    ?>

    <div class="container">
        <section class="mt-5">
            <div class="card mb-3">
                <div class="card-body">
                    FAQ
                </div>
            </div>
                <div class="mb-3">
                    <?php
                        $rows = mysqli_query($conn, "select * FROM faq ORDER BY id DESC");
                        foreach ($rows as $key => $row) :
                    ?>
                    <div class="p-3 mb-2 border">
                        <a class="text-dark text-decoration-none" data-bs-toggle="collapse" href="#faq<?php echo $row['id']; ?>" role="button" aria-expanded="false" aria-controls="faq<?php echo $row['id']; ?>">
                            <i class="bi bi-caret-down-fill"></i> <?php echo $row['question']; ?>
                        </a>
                        
                        <div class="collapse mt-2" id="faq<?php echo $row['id']; ?>">
                            <div class="card card-body text-secondary">
                                <?php echo $row['answer']; ?>
                            </div>
                        </div>
                    </div>
                    <?php
                        endforeach;
                    ?>
                </div>
        </section>
    </div>

    <?php
        include "inc/footer.php";
    ?>
