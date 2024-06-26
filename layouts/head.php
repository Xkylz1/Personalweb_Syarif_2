<!-- head menyimpan coding mulai dari doc html head sampai navbar -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Web</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Personal Web</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-link <?php if ($pageinfo == "Home") echo "active" ?>" href="../pages/home.php">Home</a>
                    <a class="nav-link <?php if ($pageinfo == "Biography") echo "active" ?>" href="../pages/bio.php">Biography</a>
                    <a class="nav-link <?php if ($pageinfo == "Portfolio") echo "active" ?>" href="../pages/polio.php">Portfolio</a>

                    <?php
                    session_start();

                    if (!isset($_SESSION['U']) and (!isset($_SESSION['P']))) {
                        echo '<a class="nav-link" href="../pages/login.php">Login</a>';
                    } else {
                        include("../configs/connection.php");

                        $usr = $_SESSION['U'];

                        $sql = mysqli_query($connect, "select * from user where username = '$usr'");
                        $data = mysqli_fetch_array($sql);

                        echo '<a class="nav-link" href="../pages/user.php">User Management</a>';
                        echo '<a class="nav-link" href="#"> |&nbsp; Halo,</>' . $data['name'];
                        echo '<a class="nav-link" href="../pages/logout.php">(Logout)</a>';
                    }

                    ?>
                </div>
            </div>
        </div>
    </nav>
    <!-- navbar end -->