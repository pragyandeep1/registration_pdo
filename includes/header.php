<!DOCTYPE html>
<html>
<head>
    <title>Student Dataset</title>
    <!-- Replace local Font Awesome with CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark  bg-secondary">
        <a class="navbar-brand" href="home.php">Student Dataset</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <?php
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                if (isset($_SESSION['userlogin'])) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                    <?php
                } else {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </nav>
</header>