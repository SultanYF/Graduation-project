<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom" style="padding: 20px 0px;">
    <div class="container">
        <a class="navbar-brand" href="index.php">C4S</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cars.php">Cars</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="faq.php">FAQ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </li> -->
        </ul>
        <form action="search.php" method="post" class="d-flex">
            <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
        </form>
        <?php
        if(isset($_SESSION['login_username']))
        {
        ?>
            <?php
            if($_SESSION['is_admin'] == 1)
            {
            ?>
                <li class="d-flex nav-item">
                    <a class="nav-link" href="admin/dashboard.php">Dashboard</a>
                </li>
            <?php
            }
            ?>
            
            <li class="d-flex dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo $_SESSION['login_username']; ?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="users/sellcar.php">Sell Your Car</a></li>
                    <li><a class="dropdown-item" href="users/mycars.php">My Cars</a></li>
                    <li><a class="dropdown-item" href="users/reservation.php">My Reservation</a></li>
                    <li><a class="dropdown-item" href="users/profile.php">Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="users/logout.php">Logout</a></li>
                </ul>
            </li>
        <?php
        }
        else
        {
        ?>
            <li class="d-flex nav-item">
                <a class="nav-link text-secondary" href="login.php">Login</a>
            </li>
        <?php
        }
        ?>
        
        </div>
    </div>
</nav>